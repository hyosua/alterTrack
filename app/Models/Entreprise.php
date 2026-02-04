<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entreprise extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'domaine',
        'code_postal',
        'contact',
        'email',
        'tel',
        'siteweb',
    ];

    public function alternances()
    {
        return $this->hasMany(Alternance::class);
    }
}
