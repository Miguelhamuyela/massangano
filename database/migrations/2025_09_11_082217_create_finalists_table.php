<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinalistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('finalists', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->string('bi')->unique();
            $table->String('file');
            $table->String('cover')->nullable();
            $table->unsignedBigInteger('id_schools');
            $table->unsignedBigInteger('id_courses');
            $table->foreign('id_schools')->references('id')->on('schools')->onDelete('cascade');
            $table->foreign('id_courses')->references('id')->on('courses')->onDelete('cascade');
            $table->softDeletes();
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
        Schema::dropIfExists('finalists');
    }
}
