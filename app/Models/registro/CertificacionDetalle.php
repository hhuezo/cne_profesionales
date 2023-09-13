<?php

namespace App\Models\registro;

use App\Models\catalogo\EntidadCertificadora;
use App\Models\catalogo\EstadoCertificacionDetalle;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CertificacionDetalle extends Model
{
    use HasFactory;
    protected $table = 'certificacion_detalle';
    protected $primaryKey = 'Id';
    public $timestamps = false;

    protected $fillable = [
        'Descripcion',
        'Certificacion',
        'TipoTecnologia',
        'Sector',
        'Estado',
        'Numero',
        'FechaEmision',
        'FechaVencimiento',
        'EntidadCertificadora',
        'RecomendacionContratista',
        'Archivo',
        'Estado',
        'UsuarioIngreso',
        'FechaIngreso',
    ];


    public function certificacion()
    {
        return $this->belongsTo(Certificacion::class, 'Certificacion', 'Id');
    }

    public function estado()
    {
        return $this->belongsTo(EstadoCertificacionDetalle::class, 'Estado', 'Id');
    }

    public function entidad()
    {
        return $this->belongsTo(EntidadCertificadora::class, 'EntidadCertificadora', 'Id');
    }
}
