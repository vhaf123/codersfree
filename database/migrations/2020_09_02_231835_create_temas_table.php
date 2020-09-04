<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTemasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temas', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('manual_id')->unsigned();
            $table->foreign('manual_id')
                    ->references('id')->on('manuales')
                    ->onDelete('cascade');

            $table->text('capitulo')->nullable();
            
            $table->string('name');
            $table->text('body');
            
            $table->string('slug')->unique();
            $table->text('title');
            $table->text('description');

            $table->enum('status', [
                \App\Tema::BORRADOR, \App\Tema::PUBLICADO
            ])->nullable()->default(\App\Tema::BORRADOR);

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
        Schema::dropIfExists('temas');
    }
}
