<?php

namespace App\Models\configuracion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConfiguracionAlcance extends Model
{
    use HasFactory;

    protected $table = 'configuracion_alcance';
    protected $primaryKey = 'Id';
    public $timestamps = false;

    protected $fillable = [
        'Descripcion',
        'Alcance'
    ];
}
