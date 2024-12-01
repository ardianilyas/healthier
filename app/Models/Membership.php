<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Membership extends Model
{
    use HasFactory;
    protected $table = 'memberships';
    protected $guarded = ['id'];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function plan(): BelongsTo {
        return $this->belongsTo(Plan::class);
    }

    public function transaction(): MorphOne {
        return $this->morphOne(Transaction::class, 'reference');
    }
}
