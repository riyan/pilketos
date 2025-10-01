<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Paslon extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function suara(): HasMany
    {
        return $this->hasMany(Suara::class);
    }
}
