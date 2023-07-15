<?php

namespace App\Models\catalogo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    use HasFactory;

    protected $table = 'municipio';
    protected $primaryKey = 'Id';
    public $timestamps = false;

    protected $fillable = [
        'Nombre',
        'Activo',
        'Departamento',
        'Distrito',
    ];

    public function departamento()
    {
        return $this->belongsTo(Departamento::class, 'Departamento', 'Id');
    }
}

