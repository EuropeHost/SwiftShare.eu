<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create("users", function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->string("email")->unique();
            $table->string("discord_id")->unique()->nullable();
            $table->string("password")->nullable();
            $table->timestamp("email_verified_at")->nullable();
            $table->string("code")->unique()->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists("users");
    }
};
