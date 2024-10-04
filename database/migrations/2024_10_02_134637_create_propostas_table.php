<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('propostas', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->timestamps();
            $table->uuid("user_id");
            $table->foreign("user_id")->constrained(
                    table: 'users', indexName: 'propostas_user_id_fk_2'
            )->references("id")->on("users")->onDelete("cascade")->onUpdate("cascade");
            $table->string("titulo");
            $table->text("proposta");
            $table->string("slug");
            $table->enum("status", ['ativa', 'inativa'])->default("inativa");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('propostas');
    }
};
