<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLecturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lectures', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('discription')->nullable();
            $table->string('pathToFile')->nullable();

            $table->unsignedBigInteger('discipline_teacher_id');
            $table->index('discipline_teacher_id', 'lecture_discipline_teacher_idx');
            $table->foreign('discipline_teacher_id', 'lecture_discipline_teacher_fk')->on('discipline_teacher')->references('id');

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
        Schema::dropIfExists('lectures');
    }
}
