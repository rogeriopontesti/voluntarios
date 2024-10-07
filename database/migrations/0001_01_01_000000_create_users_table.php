<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('users', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->timestamps();
            $table->rememberToken();
            $table->string('nome', 255);
            $table->string('nome_social', 255)->nullable();
            $table->string('email', 100)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('telefone', 40);
            $table->enum("perfil", ['SEGUIDOR', 'FIGURA_PUBLICA', 'INFLUENCIADOR', 'CANDIDATO'])->default("SEGUIDOR");
            $table->enum("tipo_de_usuario", ['FILIADO', 'ADMINISTRADOR'])->default("ADMINISTRADOR");
            $table->enum("status", ['ATIVADO', 'DESATIVADO'])->default("ATIVADO");
            $table->text('area_de_atuacao')->nullable();
            $table->string('foto')->nullable()->default("default/assets/img/icons/usuario.png");
        });      
        
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });
        
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
