<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create( 'profiles', function ( Blueprint $table ) {
            $table->id();
            $table->string( 'full_name', 200 );
            $table->enum( 'gender', ['male', 'female', 'others'] )->default( 'male' );
            $table->date( 'birthday' );
            $table->string( 'phone', 15 )->nullable();

            // make the relation with user table
            $table->unsignedBigInteger( 'user_id' );
            $table->foreign( 'user_id' )->references( 'id' )->on( 'users' )->cascadeOnUpdate()->restrictOnDelete();

            $table->timestamp( 'created_at' )->useCurrent();
            $table->timestamp( 'updated_at' )->useCurrent()->useCurrentOnUpdate();
        } );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists( 'profiles' );
    }
};
