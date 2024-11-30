<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CartItem extends Model
{
    /** @use HasFactory<\Database\Factories\CartItemFactory> */
    use HasFactory;

    protected $table = 'cart_items';
    protected $guarded = ['id'];

    public function cart(): BelongsTo {
        return $this->belongsTo(Cart::class);
    }

    public function obat(): BelongsTo {
        return $this->belongsTo(Obat::class, 'obat_id', 'id');
    }
}
