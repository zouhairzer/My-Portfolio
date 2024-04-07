<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class informations extends Model
{
    use HasFactory;
    protected $connection = "mongodb";
    protected $collection = "informations";
    protected $fillable = [
        'name',
        'prenom',
        'email' ,
        'numero',
        'adresse',
        'date',
    ];
}
