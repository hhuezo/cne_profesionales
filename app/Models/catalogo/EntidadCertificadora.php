<?php

namespace App\Models\catalogo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EntidadCertificadora extends Model
{
    use HasFactory;

    protected $table = 'entidad_certificadora';
    protected $primaryKey = 'Id';
    public $timestamps = false;

    protected $fillable = [
        'Nombre',
        'Descripcion',
        'AlcanceCertificacion',
        'Pais',
        'Link',
        'CorreoContacto',
    ];

    public function pais()
    {
        return $this->belongsTo(Pais::class, 'Pais', 'Id');
    }}
