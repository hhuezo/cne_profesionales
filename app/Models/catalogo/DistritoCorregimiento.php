<?php

namespace App\Models\catalogo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DistritoCorregimiento extends Model
{
    use HasFactory;

    protected $table = 'distrito_corregimiento';
    protected $primaryKey = 'Id';
    public $timestamps = false;

    protected $fillable = [
        'Nombre',
        'MunicipioDistrito',
        'TipoUbicacion',
    ];

    public function municipio_distrito()
    {
        return $this->belongsTo(MunicipioDistrito::class, 'MunicipioDistrito', 'Id');
    }
}
