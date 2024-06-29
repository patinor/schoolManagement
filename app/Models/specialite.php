<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class specialite extends Model
{
    use HasFactory;

    public function enseignant():HasMany{
        return $this->hasMany(Enseignant::class);
    }
}
