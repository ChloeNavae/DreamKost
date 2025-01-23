<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Kamar extends Model
{
    protected $primaryKey = 'no_kamar'; // change primaryKey from 'id' to 'no_kamar'

    protected $fillable = ['no_kamar', 'owner_id', 'lantai', 'terisi', 'started_at', 'ended_at']; //MassAssignment protected

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
