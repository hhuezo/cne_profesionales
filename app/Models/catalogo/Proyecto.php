<?php

namespace App\Models\catalogo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    use HasFactory;

    protected $table = 'proyecto';
    protected $primaryKey = 'Id';
    public $timestamps = false;

    protected $fillable = [
        'Descripcion',
        'TipoTecnologia',
        'Sector',
        'Archivo',
        'Activo',
        'Perfil',
        'UsuarioIngreso',
        'FechaIngreso',
        'FechaInicio',
        'FechaFinalizacion',
        'Pais',
        'RecomendacionContratista',
        'ImagenUrl',
    ];

    public function perfil()
    {
        return $this->belongsTo(Perfil::class, 'Perfil', 'Id');
    }

    public function usuarioIngreso()
    {
        return $this->belongsTo(User::class, 'UsuarioIngreso', 'id');
    }

    public function pais()
    {
        return $this->belongsTo(Pais::class, 'Pais', 'Id');
    }
}
