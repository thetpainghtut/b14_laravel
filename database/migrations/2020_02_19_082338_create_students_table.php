<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('namee');
            $table->string('namem');
            $table->string('email')->unique();
            $table->string('phone');
            $table->text('address');
            $table->text('education');
            $table->string('city');
            $table->string('accepted_year');
            $table->date('dob');
            $table->string('gender');
            $table->string('p1');
            $table->string('p1_phone');
            $table->string('p1_relationship');
            $table->string('p2');
            $table->string('p2_phone');
            $table->string('p2_relationship');
            $table->text('because');

            $table->unsignedBigInteger('batch_id');
            $table->timestamps();

            $table->foreign('batch_id')
                  ->references('id')->on('batches')
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
        Schema::dropIfExists('students');
    }
}
