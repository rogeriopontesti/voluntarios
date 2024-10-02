<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('cabos_eleitorais', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid("owner_id");
            $table->foreign("owner_id")->constrained()->references("id")->on("users")->cascadeOnUpdate()->cascadeOnDelete();
            $table->uuid("user_id");
            $table->foreign("user_id")->constrained(
                    table: 'users', indexName: 'posts_user_id_fk_1'
            )->references("id")->on("users")->cascadeOnUpdate()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('cabos_eleitorais');
    }
};
