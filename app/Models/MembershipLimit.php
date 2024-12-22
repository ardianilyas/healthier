<?php

namespace App\Models;

use App\Models\Membership;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MembershipLimit extends Model
{
    protected $table = "membership_limits";
    protected $guarded = ['id'];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function membership(): BelongsTo {
        return $this->belongsTo(Membership::class);
    }
}
