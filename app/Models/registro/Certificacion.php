<?php

namespace App\Models\registro;

use App\Models\catalogo\EstadoCertificacion;
use App\Models\catalogo\Perfil;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificacion extends Model
{
    use HasFactory;

    protected $table = 'certificacion';
    protected $primaryKey = 'Id';
    public $timestamps = false;

    protected $fillable = [
        'Descripcion',
        'Perfil',
        'FechaCreacion',
        'UsuarioCreacion',
        'Estado',
        'Administrador',
        'FechaActualizacion',
        'UsuarioActualizacion',
    ];

    public function perfil()
    {
        return $this->belongsTo(Perfil::class, 'Perfil', 'Id');
    }

    public function estado()
    {
        return $this->belongsTo(EstadoCertificacion::class, 'Estado', 'Id');
    }

    public function usuario_ingreso()
    {
        return $this->belongsTo(User::class, 'UsuarioCreacion', 'id');
    }

    public function usuario_update()
    {
        return $this->belongsTo(User::class, 'UsuarioActualizacion', 'id');
    }

}
