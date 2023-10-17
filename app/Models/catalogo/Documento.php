<?php

namespace App\Models\catalogo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    use HasFactory;


    protected $table = 'documento';
    protected $primaryKey = 'Id';
    public $timestamps = false;

    protected $fillable = [
        'Url',
        'Perfil',
        'Descripcion'
    ];
}
