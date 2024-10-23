<?php

namespace App\Http\Controllers;

use App\Models\Note;
use DOMDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class NoteController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store( Request $request ) {
        $validate = $request->validate( [
            'title' => 'required|unique:notes,title',
            'text'  => 'required',
        ] );

        try {
            $speech = null;
            $dom    = new DOMDocument();
            $dom->loadHTML( $request->input( 'text' ) );
            $head = $dom->createElement( 'head' );
            $dom->appendChild( $head );
            $meta = $dom->createElement( 'meta' );
            $meta->setAttribute( 'http-equiv', 'Content-Type' );
            $meta->setAttribute( 'content', 'text/html; charset=utf-8' );
            $head->appendChild( $meta );

            $images = $dom->getElementsByTagName( 'img' );
            foreach ( $images as $key => $img ) {
                if ( strpos( $img->getAttribute( 'src' ), ';base64,' ) ) {
                    $data = base64_decode( explode( ',', explode( ';', $img->getAttribute( 'src' ) )[1] )[1] );
                    $name = Storage::disk( 'public' )->put( 'notes/files', $data );
                    file_put_contents( $name, $data );
                    $img->removeAttribute( 'src' );
                    $img->setAttribute( 'src', "/" . $name );
                }
                $img->removeAttribute( 'style' );
            }
            $speech = $dom->saveHTML();

            Note::create( [
                'title'   => $request->input( 'title' ),
                'privacy' => 'public',
                'user_id' => Auth::id(),
                'text'    => $speech,
            ] );
            return to_route( 'dashboard',[
                'notes' => Note::all()
            ] )->with('message', 'Note successfully saved');
        } catch ( \Throwable $th ) {
            return to_route( 'dashboard' )->withErrors(
                [
                    "text" => "Note Couldn't Save",
                ]
            )->onlyInput( 'text' );
        }

    }

    /**
     * Display the specified resource.
     */
    public function show( Note $note, $id = null ) {
        try {
            $notes = null;
            if ( $id !== null ) {
                $notes = Note::find( $id );
            } else {
                $notes = Note::where( 'user_id', Auth::id() )->get();
            }
            return response()->json( [
                'status' => true,
                'data'   => $notes,
            ], 200 );
        } catch ( \Throwable $th ) {
            return response()->json( [
                'status' => false,
                'errors'   => $th->getMessage(),
            ], 400 );
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( Note $note ) {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update( Request $request, Note $note ) {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( Note $note ) {
        //
    }
}
