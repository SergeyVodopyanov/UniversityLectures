<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDisciplineTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discipline_teacher', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('discipline_id');
            $table->unsignedBigInteger('teacher_id');

            $table->timestamps();

            $table->index('discipline_id', 'discipline_teacher_discipline_idx');
            $table->index('teacher_id', 'discipline_teacher_teacher_idx');

            $table->foreign('discipline_id', 'discipline_teacher_discipline_idx')->on('disciplines')->references('id');
            $table->foreign('teacher_id', 'discipline_teacher_teacher_idx')->on('users')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('discipline_teachers');
    }
}
