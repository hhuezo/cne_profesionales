<?php

namespace App\Models\catalogo;

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
        'Municipio',
        'Distrito',
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
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'Usuario', 'id');
    }



    public function distrito()
    {
        return $this->belongsTo(DistritoCorregimiento::class, 'Distrito', 'Id');
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
}
