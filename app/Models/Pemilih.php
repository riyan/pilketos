<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Pemilih extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function suara(): HasOne
    {
        return $this->hasOne(Suara::class);
    }
}
