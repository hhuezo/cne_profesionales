<?php

namespace App\Models\catalogo;

use App\Models\Pais;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    use HasFactory;

    protected $table = 'perfil';
    protected $primaryKey = 'Id';
    public $timestamps = true;

    protected $fillable = [
        'Usuario',
        'Dui',
        'DuiURL',
        'Profesion',
        'TituloURL',
        'Nacionalidad',
        'DistritoCorregimiento',
        'Direccion',
        'Telefono',
        'UsuarioIngreso',
        'FechaIngreso',
        'NivelVerificacion',
        'Certificador',
        'TipoOcupacionCertificada',
        'NumeroCertificacion',
        'LicenciaURL',
        'VigenciaCertificacion',
        'created_at',
        'updated_at',
        'Conteo'
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'Usuario', 'id');
    }



    public function distrito_corregimiento()
    {
        return $this->belongsTo(DistritoCorregimiento::class, 'DistritoCorregimiento', 'Id');
    }

    public function usuarioIngreso()
    {
        return $this->belongsTo(User::class, 'UsuarioIngreso', 'id');
    }

    public function certificador()
    {
        return $this->belongsTo(EntidadCertificadora::class, 'Certificador', 'Id');
    }

    public function tipoOcupacionCertificada()
    {
        return $this->belongsTo(TipoCertificado::class, 'TipoOcupacionCertificada', 'Id');
    }

    public function pais()
    {
        return $this->belongsTo(Pais::class, 'Pais', 'Id');
    }

    public function profesion()
    {
        return $this->belongsTo(Profesion::class, 'Profesion', 'Id');
    }

    public function nacionalidad()
    {
        return $this->belongsTo(Pais::class, 'Nacionalidad', 'Id');
    }
}
