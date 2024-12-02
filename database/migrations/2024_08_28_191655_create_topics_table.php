<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('topics', function (Blueprint $table) {
            $table->id(); // Cria uma coluna id como unsigned big integer
            $table->unsignedBigInteger('user_id'); // Chave estrangeira para a tabela users
            $table->unsignedBigInteger('category_id'); // Chave estrangeira para a tabela categories
            $table->string('title'); // Título do tópico
            $table->text('description'); // Descrição do tópico
            $table->boolean('status')->default(true); // Status do tópico
            $table->timestamps(); // Cria as colunas created_at e updated_at

            // Definindo a chave estrangeira para user_id
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            // Definindo a chave estrangeira para category_id
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('topics');
    }
};