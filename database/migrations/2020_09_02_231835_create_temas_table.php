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

            $table->unsignedBigInteger('capitulo_id')->unsigned();
            $table->foreign('capitulo_id')
                    ->references('id')->on('capitulos')
                    ->onDelete('cascade');

            $table->string('name');
            $table->text('body')->nullable();
            
            $table->string('slug')->unique();
            $table->text('title');
            $table->text('description');

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
