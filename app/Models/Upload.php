<?php

namespace App\Models;

use App\Models\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Upload extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        "user_id",
        "password",
        "download_limit",
        "delete_token",
        "expires_at",
    ];

    protected function casts(): array
    {
        return [
            "expires_at" => "datetime",
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function files(): HasMany
    {
        return $this->hasMany(File::class);
    }

    public function downloads(): HasMany
    {
        return $this->hasMany(Download::class);
    }
}
