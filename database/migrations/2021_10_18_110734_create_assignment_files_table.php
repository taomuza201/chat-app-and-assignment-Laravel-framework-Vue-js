<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignmentFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assignment_files', function (Blueprint $table) {
            $table->bigIncrements('assignment_files_id');


            $table->bigInteger('assignments_id')->unsigned()->index()->nullable();
            $table->foreign('assignments_id')->references('assignments_id')->on('assignments')->onDelete('cascade');


            $table->string('assignments_file');
            $table->string('assignments_file_name');


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
        Schema::dropIfExists('assignment_files');
    }
}
