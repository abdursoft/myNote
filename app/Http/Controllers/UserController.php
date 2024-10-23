<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class UserController extends Controller
{
    /**
     * User Login
     */
    public function login(Request $request)
    {
        $credential = $request->validate([
            'email' => ['required','email','exists:users','max:130'],
            'password' => ['required', 'max:100']
        ]);

        if(Auth::attempt($credential,$request->remember)){
            $request->session()->regenerate();
            $notes = Note::get();
            return Inertia::render('Pages/Home',[
                'notes' => $notes
            ]);
        }else{
            return back()->withErrors([
                'email' => 'Invalid user credentials'
            ])->onlyInput('email');
        }
    }

    /**
     * User registration 
     */
    public function register(Request $request){
        $data = $request->validate([
            'name' => ['required','max:100'],
            'email' => ['required','email','unique:users'],
            'password' => ['required','max:100']
        ]);

        try {
            User::create($data);
            return to_route('home');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * User dashboard
     */
    public function dashboard(){
        return Inertia::render('Home',[
            'notes' => Note::where('user_id', Auth::id())->get()
        ]);
    }

    /**
     * User logout
     */
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return to_route('login');
    }
}
