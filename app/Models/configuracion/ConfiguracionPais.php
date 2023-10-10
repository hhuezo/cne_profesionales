<?php

namespace App\Models\configuracion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConfiguracionPais extends Model
{
    use HasFactory;

    protected $table = 'configuracion_pais';
    protected $primaryKey = 'Id';
    public $timestamps = false;

    protected $fillable = [
        'Pais'
    ];
}
