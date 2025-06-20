<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create("downloads", function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->foreignUuid("file_id")->constrained()->onDelete("cascade");
            $table->foreignUuid("upload_id")->constrained()->onDelete("cascade");
            $table->ipAddress()->nullable();
            $table->text("user_agent")->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists("downloads");
    }
};
