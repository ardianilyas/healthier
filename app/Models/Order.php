<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $guarded = ['id'];

    public function transactions(): MorphMany {
        return $this->morphMany(Transaction::class, 'transactionable');
    }
}
