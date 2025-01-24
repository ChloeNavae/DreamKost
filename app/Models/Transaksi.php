<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Http\Request;

class Transaksi extends Model
{
    protected $fillable = [
        'owner_id',
        'image',
        'no_kamar',
        'durasi',
    ]; //MassAssignment protected

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
