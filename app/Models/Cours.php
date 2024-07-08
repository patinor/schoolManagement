<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cours extends Model
{
    use HasFactory;


    public function enseignant():BelongsTo {
        return $this->belongsTo(Enseignant::class);
    }


    public function lecon():HasMany {
        return $this->hasMany(Lecon::class);
    }
}
