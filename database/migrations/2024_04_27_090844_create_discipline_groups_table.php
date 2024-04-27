<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDisciplineGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discipline_group', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('discipline_id');
            $table->unsignedBigInteger('group_id');

            $table->index('discipline_id', 'discipline_group_discipline_idx');
            $table->index('group_id', 'discipline_group_group_idx');

            $table->foreign('discipline_id', 'discipline_group_discipline_idx')->on('disciplines')->references('id');
            $table->foreign('group_id', 'discipline_group_group')->on('groups')->references('id');

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
        Schema::dropIfExists('discipline_groups');
    }
}
