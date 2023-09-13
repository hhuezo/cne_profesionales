<?php

namespace App\Models\catalogo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepartamentoProvincia extends Model
{
    use HasFactory;

    protected $table = 'departamento_provincia';
    protected $primaryKey = 'Id';
    public $timestamps = false;

    protected $fillable = [
        'Nombre',
        'Pais',
        'TipoUbicacion',
        'Codigo',
    ];

    public function pais()
    {
        return $this->belongsTo(Pais::class, 'Pais', 'Id');
    }
}
