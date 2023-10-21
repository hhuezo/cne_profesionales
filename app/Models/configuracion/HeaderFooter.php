<?php

namespace App\Models\configuracion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeaderFooter extends Model
{
    use HasFactory;
    protected $table = 'configuracion_header_footer';
    protected $primaryKey = 'Id';
    public $timestamps = false;

    protected $fillable = [
        'LogoUno',
        'LogoDos',
        'LogoTres',
        'LogoCuatro',
        'Institucion',
        'Direccion',
        'Telefono',
        'Correo',
        'LogoPie',
        'Facebook',
        'Instagram',
        'Twitter',
    ];
}
