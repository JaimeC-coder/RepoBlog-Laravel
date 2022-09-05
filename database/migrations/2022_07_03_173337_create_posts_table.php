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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('name');// campo string
            $table->string('slug');//campo string
            $table->text('extract')->nullable();//campo texto osea mas grande que el string

            $table->longText('body')->nullable();//campo texto osea mas grande que el texto

            $table->enum('status', [1,2])->default(1);//campo enum, 1 es activo y 2 es inactivo y por defecto es 1

            $table->unsignedBigInteger('user_id');//asi se le infica que este campo es de llave foranea
            $table->unsignedBigInteger('category_id');//asi se le infica que este campo es de llave foranea

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');//asi se le infica que este campo es de llave foranea y que se elimine la fila de la tabla users cuando se elimine la fila de la tabla posts
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');//asi se hace referencia a la llave foranea de la tabla categories

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
        Schema::dropIfExists('posts');
    }
};
