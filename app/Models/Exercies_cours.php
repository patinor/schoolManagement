<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Exercies_cours extends Model
{
    use HasFactory;

    public function enseignant():BelongsTo {
        return $this->belongsTo(Enseignant::class);
    }
}
