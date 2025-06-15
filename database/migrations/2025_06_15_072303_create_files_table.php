<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create("files", function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->foreignUuid("upload_id")->constrained()->onDelete("cascade");
            $table->string("path");
            $table->string("original_name");
            $table->string("mime_type");
            $table->unsignedBigInteger("size");
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists("files");
    }
};
