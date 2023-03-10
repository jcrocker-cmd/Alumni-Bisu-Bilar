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
        Schema::create('alumni_id', function (Blueprint $table) {
            $table->id();
            $table->string('a_no')->nullable();
            $table->string('id_no')->nullable();
            $table->string('name')->nullable();
            $table->string('address')->nullable();
            $table->string('bday')->nullable();
            $table->string('course')->nullable();
            $table->string('signature')->nullable();
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
        Schema::dropIfExists('alumni_id');
    }
};
