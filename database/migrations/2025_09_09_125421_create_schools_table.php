<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schools', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('nSchool')->unique();
            $table->string('email')->unique();
            $table->string('nif')->unique();
            $table->string('phone');
            $table->string('nRoom');
            $table->string('bout');
            $table->string('schoolCategory')->nullable();
            $table->text('description')->nullable();
            $table->enum('schoolType', ['publica', 'privada'])->default('publica'); // 'public' or 'private'
            $table->enum('schoolLevel', ['Iº Ano', 'IIº Ano', 'IIIº Ano', 'IVº Ano', 'Vº Ano'])->default('Iº Ano');
            $table->unsignedBigInteger('id_provinces');
            $table->unsignedBigInteger('id_counties');
            $table->unsignedBigInteger('id_courses');
            $table->foreign('id_courses')->references('id')->on('courses')->onDelete('cascade');
            $table->foreign('id_provinces')->references('id')->on('provinces')->onDelete('cascade');
            $table->foreign('id_counties')->references('id')->on('counties')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schools');
    }
}
