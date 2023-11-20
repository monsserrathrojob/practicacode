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
        Schema::create('informacion_empresa', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('phone',15);
            $table->text('mision');
            $table->text('vision');
            $table->string('email');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('informacion_empresa');
    }
};
