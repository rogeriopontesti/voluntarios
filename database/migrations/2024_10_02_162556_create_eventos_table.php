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
        Schema::create('eventos', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid("user_id");
            $table->foreign("user_id")->constrained(
                    table: 'users', indexName: 'eventos_user_id_fk_1'
            )->references("id")->on("users")->onDelete("cascade")->onUpdate("cascade");
            $table->timestamps();
            $table->string("titulo")->unique();
            $table->string("slug")->unique();
            $table->text("evento");
            $table->date("data");
            $table->time("hora");
            $table->string("local");
        });
    }
   
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eventos');
    }
};
