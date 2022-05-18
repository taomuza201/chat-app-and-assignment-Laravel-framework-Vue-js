<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignmentUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assignment_users', function (Blueprint $table) {
            $table->bigIncrements('assignment_users_id');



            $table->bigInteger('assignments_id')->unsigned()->index()->nullable();
            $table->foreign('assignments_id')->references('assignments_id')->on('assignments')->onDelete('cascade');


            $table->bigInteger('assignment_users_by')->unsigned()->index()->nullable();
            $table->foreign('assignment_users_by')->references('id')->on('users')->onDelete('cascade');


            $table->integer('assignment_users_status')->default(1);

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
        Schema::dropIfExists('assignment__users');
    }
}
