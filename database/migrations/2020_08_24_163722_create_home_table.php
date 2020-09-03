<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home', function (Blueprint $table) {
            $table->id();

            $table->string('meta_title');
            $table->string('meta_description');

            $table->string('portada_picture')->nullable();
            $table->string('portada_title');
            $table->string('portada_text');
            $table->string('portada_search');

            $table->string('contenido_icon_1');
            $table->string('contenido_picture_1')->nullable();
            $table->string('contenido_title_1');
            $table->string('contenido_subtitle_1');
            $table->string('contenido_text_1');

            $table->string('contenido_icon_2');
            $table->string('contenido_picture_2')->nullable();
            $table->string('contenido_title_2');
            $table->string('contenido_subtitle_2');
            $table->string('contenido_text_2');

            $table->string('contenido_icon_3');
            $table->string('contenido_picture_3')->nullable();
            $table->string('contenido_title_3');
            $table->string('contenido_subtitle_3');
            $table->string('contenido_text_3');

            $table->string('contenido_icon_4');
            $table->string('contenido_picture_4')->nullable();
            $table->string('contenido_title_4');
            $table->string('contenido_subtitle_4');
            $table->string('contenido_text_4');

            $table->string('ventaja_icon_1');
            $table->string('ventaja_title_1');
            $table->string('ventaja_text_1');

            $table->string('ventaja_icon_2');
            $table->string('ventaja_title_2');
            $table->string('ventaja_text_2');

            $table->string('ventaja_icon_3');
            $table->string('ventaja_title_3');
            $table->string('ventaja_text_3');

            $table->string('nuevo_contenido_picture')->nullable();
            $table->string('nuevo_contenido_title');
            $table->string('nuevo_contenido_subtitle');

            $table->string('informacion_title');
            $table->text('informacion_text');
            $table->string('informacion_picture')->nullable();

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
        Schema::dropIfExists('home');
    }
}
