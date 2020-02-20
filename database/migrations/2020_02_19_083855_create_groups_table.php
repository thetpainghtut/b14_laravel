<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->unsignedBigInteger('batch_id');
            $table->unsignedBigInteger('mentor_id')->nullable();

            $table->timestamps();

            $table->foreign('batch_id')
                  ->references('id')->on('batches')
                  ->onDelete('cascade');

            $table->foreign('mentor_id')
                  ->references('id')->on('mentors')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('groups');
    }
}
