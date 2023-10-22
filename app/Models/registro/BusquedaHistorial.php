<?php

namespace App\Models\registro;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusquedaHistorial extends Model
{
    use HasFactory;
    protected $table = 'busqueda_historial';
    protected $primaryKey = 'Id';
    public $timestamps = false;

    protected $fillable = [
        'Tipo',
        'Perfil',
        'Fecha'
    ];
}
