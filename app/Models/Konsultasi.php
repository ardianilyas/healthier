<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Konsultasi extends Model
{
    /** @use HasFactory<\Database\Factories\KonsultasiFactory> */
    use HasFactory;

    protected $table = 'konsultasi';
    protected $guarded = ['id'];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function balasan(): HasMany {
        return $this->hasMany(Balasan::class);
    }
}
