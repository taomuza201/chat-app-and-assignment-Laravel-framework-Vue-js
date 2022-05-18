<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chats', function (Blueprint $table) {
            $table->id();


            $table->bigInteger('user_id')->unsigned()->index()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->bigInteger('to_id')->unsigned()->index()->nullable();
            $table->foreign('to_id')->references('id')->on('users')->onDelete('cascade');

            $table->string('type');

            $table->boolean('seen')->default(false);
            $table->text('message');


            $table->bigInteger('threads_id')->unsigned()->index()->nullable();
            $table->foreign('threads_id')->references('id')->on('threads')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chats');
    }
}
