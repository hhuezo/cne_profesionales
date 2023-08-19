<?php

namespace App\Models\catalogo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoCertificacion extends Model
{
    use HasFactory;
    protected $table = 'certificacion_estado';
    protected $primaryKey = 'Id';
    public $timestamps = false;

    protected $fillable = [
        'Nombre',
    ];
}
