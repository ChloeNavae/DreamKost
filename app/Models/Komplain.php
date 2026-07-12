<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Komplain extends Model
{
    protected $fillable = [
        'owner_id',
        'judul',
        'isi',
        'status',
    ];

    public function penghuni(): BelongsTo
    {
        return $this->belongsTo(User::class, 'owner_id');
    }
}
