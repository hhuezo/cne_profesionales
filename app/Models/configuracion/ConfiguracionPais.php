<?php

namespace App\Models\configuracion;

use App\Models\catalogo\Pais;
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

    public function pais()
    {
        return $this->belongsTo(Pais::class, 'Pais', 'Id');
    }
}
