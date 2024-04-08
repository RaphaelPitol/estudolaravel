<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    // diz quais campos enviamos para o banco para gravar os dados
    protected $fillable = ['nome', 'endereco', 'observacao'];
}
