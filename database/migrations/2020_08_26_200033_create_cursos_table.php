<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cursos', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->text('descripcion');
            $table->string('picture')->nullable();

            $table->string('title');
            $table->text('description');
            $table->string('slug')->unique();

            $table->unsignedBigInteger('profesor_id')->nullable();            
            $table->foreign('profesor_id')
                    ->references('id')->on('profesores')
                    ->onDelete('set null');

            $table->unsignedBigInteger('categoria_id')->unsigned()->nullable();
            $table->foreign('categoria_id')
                    ->references('id')->on('categorias')
                    ->onDelete('set null');

            $table->unsignedBigInteger('nivel_id')->unsigned()->nullable();
            $table->foreign('nivel_id')
                    ->references('id')->on('niveles')
                    ->onDelete('set null');
            

            $table->enum('status', [
                \App\Curso::BORRADOR, \App\Curso::ELABORACION, \App\Curso::CULMINADO
            ])->nullable()->default(\App\Curso::BORRADOR);

            $table->timestamps();
            $table->softDeletes()->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cursos');
    }
}
