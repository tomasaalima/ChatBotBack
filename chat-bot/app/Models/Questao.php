<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Questao extends Model
{
    use HasFactory;
    protected $table = 'questao';
    protected $fillable = 
    [
        'id',
        'pergunta',
        'proximos',
    ];
}