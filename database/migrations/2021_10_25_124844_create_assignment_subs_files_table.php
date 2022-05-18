<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignmentSubsFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assignment_subs_files', function (Blueprint $table) {
            $table->bigIncrements('assignment_subs_files_id');


            $table->bigInteger('assignment_subs_id')->unsigned()->index()->nullable();
            $table->foreign('assignment_subs_id')->references('assignment_subs_id')->on('assignment_subs')->onDelete('cascade');


            $table->string('assignment_subs_files');
            $table->string('assignment_subs_files_name');


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
        Schema::dropIfExists('assignment_subs_files');
    }
}
