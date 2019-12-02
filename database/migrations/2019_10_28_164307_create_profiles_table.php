<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->bigIncrements('id')->nullable();
            $table->string('avatar')->nullable();
            $table->date('birthdate')->nullable();

            $table->unsignedBigInteger('role')->nullable();

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->timestamps();
        });

        // ----- Default User ----- //
        $user = new App\User();
        $user->name = 'George Tsvimitidze';
        $user->email = 'gtsvimitidze@gmail.com';
        $user->password = Hash::make('321321');
        $user->save();
        // ------------------------- //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
