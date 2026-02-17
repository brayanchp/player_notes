<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Note extends Model
{
    use HasFactory;

    protected $fillable = [
        'player_id',
        'user_id',
        'note',
    ];

    public function Player(): BelongsTo
    {
        return $this->belongsTo(Player::class);
    }

    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
