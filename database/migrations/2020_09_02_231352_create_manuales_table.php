<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManualesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manuales', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('categoria_id')->unsigned()->nullable();
            $table->foreign('categoria_id')
                    ->references('id')->on('categorias')
                    ->onDelete('set null');
    

            $table->string('name');
            $table->string('title');

            $table->text('descripcion');
            $table->string('description');

            $table->string('slug')->unique();
            
            $table->string('picture')->nullable();

            $table->enum('status', [
                \App\Manual::BORRADOR, \App\Manual::PUBLICADO
            ])->nullable()->default(\App\Manual::BORRADOR);

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
        Schema::dropIfExists('manuales');
    }
}
