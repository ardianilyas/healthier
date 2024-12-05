<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Auth;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $guarded = ['id'];

    public function transactions(): MorphMany {
        return $this->morphMany(Transaction::class, 'transactionable');
    }

    public function cart(): BelongsTo {
        return $this->belongsTo(Cart::class);
    }

    public function scopeOrder(Builder $query) {
        return $query->where('user_id', Auth::id());
    }
}
