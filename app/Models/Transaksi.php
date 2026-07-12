<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaksi extends Model
{
    protected $fillable = [
        'owner_id',
        'image',
        'no_kamar',
        'durasi',
        'status',
    ]; //MassAssignment protected

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function kamar(): BelongsTo
    {
        return $this->belongsTo(Kamar::class, 'no_kamar', 'no_kamar');
    }
}
