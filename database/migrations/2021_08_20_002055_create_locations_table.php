<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
             $table->id();
            $table->string('country');
            $table->string('state')->nullable();
            $table->string('city');
            $table->unsignedBigInteger('job_id')->unique();
            $table->foreign('job_id')->references('id')->on('jobs')->onDelete('cascade')->onUpdate('cascade');
            // $table->unsignedBigInteger('company_id')->unique();
            // $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('locations');
    }
}
