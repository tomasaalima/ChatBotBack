<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('questao', function (Blueprint $table) {
            $table->increments('id');
<<<<<<< HEAD:chat-bot/database/migrations/2023_04_07_181106_create_questions_table.php
            $table->string('pergunta', 1000);
            $table->string('resposta', 1000);
            $table->string('assunto');
=======
            $table->string('pergunta');
            $table->string('proximos');
            $table->timestamps();
>>>>>>> d17e7e6617cd624090f3fc5e343b03c91c9099a4:chat-bot/database/migrations/2023_04_07_181106_create_questao_table.php
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questao');
    }
};
