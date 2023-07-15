<?php

namespace App\Models\catalogo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoCertificado extends Model
{
    use HasFactory;

    protected $table = 'tipo_certificado';
    protected $primaryKey = 'Id';
    public $timestamps = false;

    protected $fillable = [
        'Descripcion',
        'Alcance',
    ];
}
