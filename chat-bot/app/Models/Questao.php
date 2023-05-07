<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Questao extends Model
{
<<<<<<< HEAD:chat-bot/app/Models/Question.php
    protected $fillable =
=======
    use HasFactory;
    protected $table = 'questao';
    protected $fillable = 
>>>>>>> d17e7e6617cd624090f3fc5e343b03c91c9099a4:chat-bot/app/Models/Questao.php
    [
        'id',
        'pergunta',
        'resposta',
        'assunto'
    ];
}
