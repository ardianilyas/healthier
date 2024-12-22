<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Balasan extends Model
{
    /** @use HasFactory<\Database\Factories\BalasanFactory> */
    use HasFactory;

    protected $table = 'balasan';
    protected $guarded = ['id'];

    public function konsultasi(): BelongsTo {
        return $this->belongsTo(Konsultasi::class);
    }

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }
}
