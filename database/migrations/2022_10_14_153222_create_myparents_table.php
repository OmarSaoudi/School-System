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
        Schema::create('myparents', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('password');

            //Father information
            $table->string('name_father');
            $table->string('national_id_father');
            $table->string('passport_id_father');
            $table->string('phone_father');
            $table->string('job_father');
            $table->string('address_father');
            $table->foreignId('nationalitie_father_id')->references('id')->on('nationalities')->onDelete('cascade');
            $table->foreignId('blood_father_id')->references('id')->on('bloods')->onDelete('cascade');
            $table->foreignId('religion_father_id')->references('id')->on('religions')->onDelete('cascade');


            //Mother information
            $table->string('name_mother');
            $table->string('national_id_mother');
            $table->string('passport_id_mother');
            $table->string('phone_mother');
            $table->string('job_mother');
            $table->string('address_mother');
            $table->foreignId('nationalitie_mother_id')->references('id')->on('nationalities')->onDelete('cascade');
            $table->foreignId('blood_mother_id')->references('id')->on('bloods')->onDelete('cascade');
            $table->foreignId('religion_mother_id')->references('id')->on('religions')->onDelete('cascade');
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
        Schema::dropIfExists('myparents');
    }
};
