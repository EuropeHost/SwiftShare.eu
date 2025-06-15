<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create("uploads", function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->foreignUuid("user_id")->nullable()->constrained()->onDelete("cascade");
            $table->string("password")->nullable();
            $table->unsignedInteger("download_limit")->nullable();
            $table->string("delete_token")->unique()->nullable();
            $table->timestamp("expires_at")->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists("uploads");
    }
};
