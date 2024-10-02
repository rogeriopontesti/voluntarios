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
        Schema::create('comentarios_contribuicoes', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->timestamps();
            $table->uuid("user_id");
            $table->foreign("user_id")->constrained(
                    table: 'users', indexName: 'posts_user_id_fk_4'
            )->references("id")->on("users")->cascadeOnUpdate()->cascadeOnDelete();
            $table->uuid("contribuicao_id");
            $table->foreign("contribuicao_id")->constrained(
                    table: 'contribuicoes', indexName: 'posts_contribuicao_id_fk_1'
            )->references("id")->on("contribuicoes")->cascadeOnUpdate()->cascadeOnDelete();
            $table->text("comentario");
            $table->enum("status", ['pendente', 'aprovada', 'rejeitada'])->default("pendente");
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comentarios_contribuicoes');
    }
};
