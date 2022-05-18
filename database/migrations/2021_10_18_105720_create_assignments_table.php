<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assignments', function (Blueprint $table) {
            $table->bigIncrements('assignments_id');
            $table->string('assignments_name');
            $table->mediumText('assignments_details');
            $table->mediumText('assignments_repeat')->nullable();
            $table->timestamp('assignments_date')->nullable();

            $table->bigInteger('assignments_chat_id')->unsigned()->index()->nullable();
            $table->foreign('assignments_chat_id')->references('id')->on('chats')->onDelete('cascade');



            $table->bigInteger('assignments_chat_group_id')->unsigned()->index()->nullable();
            $table->foreign('assignments_chat_group_id')->references('id')->on('threads')->onDelete('cascade');

            $table->bigInteger('assignments_by')->unsigned()->index()->nullable();
            $table->foreign('assignments_by')->references('id')->on('users')->onDelete('cascade');



            $table->integer('assignments_status')->default(1);   // 1 =>สั่งงานแล้ว, 2 => ยกเลิก ,3 => เสร็จ

            $table->tinyInteger('assignments_update')->default(0);


            $table->timestamp('assignments_make')->nullable(); // จะทำไมเมื่อไร


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
        Schema::dropIfExists('assignments');
    }
}
