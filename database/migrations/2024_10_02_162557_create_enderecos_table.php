<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    /**
     * Run the migrations.
     */
    public function up(): void {

        /*
          | Endereço residencial: Onde a pessoa mora.
          | Endereço comercial/profissional: Onde a pessoa exerce atividades profissionais ou comerciais.
          | Endereço de correspondência: Exclusivamente para receber cartas ou encomendas. Pode ser uma caixa postal ou um endereço alternativo.
          | Endereço de entrega: Utilizado para receber entregas de produtos ou serviços, que pode ser diferente do residencial.
          | Endereço de cobrança: Onde a pessoa recebe cobranças, faturas ou boletos. Geralmente associado a compras ou contratos.
          | Endereço fiscal: Relacionado a registros em órgãos tributários, como na Receita Federal, podendo ser residencial ou comercial, mas usado em declarações fiscais.
          | Endereço de contato: Utilizado para ser contatado diretamente, que pode ser temporário ou não ser o mesmo que o residencial.
          | Endereço de férias: Um local temporário, como casas de veraneio ou moradias em períodos de férias.
          | Endereço alternativo: Usado em situações específicas, como em casos de segurança ou proteção de dados, onde o endereço principal não é informado.
         */
        
        Schema::create('enderecos', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid("user_id");
            $table->foreign("user_id")->constrained(
                    table: 'users', indexName: 'enderecos_user_id_fk'
            )->references("id")->on("users")->onDelete("cascade")->onUpdate("cascade");
            $table->timestamps();
            $table->string('cep', 9);
            $table->string('logradouro', 255);
            $table->string('complemento')->nullable();
            $table->string('bairro', 255);
            $table->string('cidade', 255);
            $table->string('estado', 255);
            $table->enum("endereco_tipo",
                    [
                        "Endereço residencial",
                        "Endereço comercial/profissional",
                        "Endereço de correspondência",
                        "Endereço de entrega",
                        "Endereço de cobrança",
                        "Endereço fiscal",
                        "Endereço de contato",
                        "Endereço de férias",
                        "Endereço alternativo",
                    ])->default("Endereço residencial");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('enderecos');
    }
};
