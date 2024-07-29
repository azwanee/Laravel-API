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
        Schema::create('pemains', function (Blueprint $table) {
            $table->id();
            $table->String('Nama');
            $table->String('Foto')->nullable();
            $table->date('TTL');
            $table->Integer('Harga');
            $table->enum('Posisi', ['gk', 'df', 'mf', 'fw']);
            $table->String('Negara');
            $table->unsignedBigInteger('id_klub');
            $table->foreign('id_klub')->references('id')->on('klubs')->onDelete("cascade");
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
        Schema::dropIfExists('pemains');
    }
};
