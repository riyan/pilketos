<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Suara extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function paslon(): BelongsTo
    {
        return $this->belongsTo(Paslon::class);
    }

    public function pemilih(): BelongsTo
    {
        return $this->belongsTo(Pemilih::class);
    }
}
