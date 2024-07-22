<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Travaux extends Model
{
    public $table = 'travauxes';

    public $fillable = [
        'nom',
        'nbr_pers'
    ];

    protected $casts = [
        'nom' => 'string',
        'nbr_pers' => 'integer'
    ];

    public static array $rules = [
        'nom' => 'required|max:255',
        'nbr_pers' => 'required|integer'
    ];


}
