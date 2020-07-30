<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHallpassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hallpasses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('location_id');
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('staff_id');
            $table->string('status')->default('pending');
            $table->timestamps();

            $table->foreign('location_id')
                  ->references('id')
                  ->on('locations')
                  ->onDelete('cascade');

            $table->foreign('student_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');

            $table->foreign('staff_id')
                  ->references('id')
                  ->on('users')
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
        Schema::dropIfExists('hallpasses');
    }
}
