<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignmentSubsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assignment_subs', function (Blueprint $table) {
            $table->bigIncrements('assignment_subs_id');

            $table->mediumText('assignment_subs_details');

            $table->bigInteger('assignment_users_id')->unsigned()->index()->nullable();
            $table->foreign('assignment_users_id')->references('assignment_users_id')->on('assignment_users')->onDelete('cascade');

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
        Schema::dropIfExists('assignment_subs');
    }
}
