<?php

namespace App\Models\catalogo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MunicipioDistrito extends Model
{
    use HasFactory;
    protected $table = 'municipio_distrito';
    protected $primaryKey = 'Id';
    public $timestamps = false;

    protected $fillable = [
        'Nombre',
        'DepartamentoProvincia',
        'TipoUbicacion',
    ];
}
