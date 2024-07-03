<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Enseignant extends Model
{
    use HasFactory;


    public function specialite():BelongsTo{
        return $this ->belongsTo(specialite::class);
    }


    public function cours():HasMany {
        return $this ->hasMany(cours::class);
    }
    public function correctionEtudiant():HasMany {
        return $this->hasMany(CorrectionEtudiant::class);
    }


    public function exercice_cours():HasMany{
        return $this ->hasMany(Exercies_cours::class);
    }
}
