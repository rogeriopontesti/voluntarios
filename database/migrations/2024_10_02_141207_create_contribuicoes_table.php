<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('contribuicoes', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->timestamps();
            $table->uuid("user_id");
            $table->foreign("user_id")->constrained(
                    table: 'users', indexName: 'posts_user_id_fk_3'
            )->references("id")->on("users")->cascadeOnUpdate()->cascadeOnDelete();
            $table->uuid("proposta_id");
            $table->foreign("proposta_id")->constrained(
                    table: 'propostas', indexName: 'posts_proposta_id_fk_1'
            )->references("id")->on("propostas")->cascadeOnUpdate()->cascadeOnDelete();
            $table->text("contribuicao");
            $table->enum("status", ['pendente', 'aprovada', 'rejeitada'])->default("pendente");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('contribuicoes');
    }
};
