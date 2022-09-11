<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visitors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('mrn');
            $table->string('reference_no');
            $table->enum('gender',['male','female']);
            $table->date('birth_date')->nullable();
            $table->string('location')->nullable();
            $table->bigInteger('lab_id')->nullable();
            $table->string('sample_no')->nullable();
            $table->string('passport_no')->nullable();
            $table->dateTime('reg_date')->nullable();
            $table->dateTime('collection_date')->nullable();
            $table->dateTime('reporting_date')->nullable();
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
        Schema::dropIfExists('visitors');
    }
};
