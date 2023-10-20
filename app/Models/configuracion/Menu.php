<?php

namespace App\Models\configuracion;

use App\Models\editor\Snippet;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $table = 'configuracion_menu';
    protected $primaryKey = 'Id';
    public $timestamps = false;

    protected $fillable = [
        'Descripcion',
        'Pagina',
        'Snippet'
    ];


    public function snippet()
    {
        return $this->belongsTo(Snippet::class, 'Snippet', 'Id');
    }

    public function sub_menus($id)
    {
        return Menu::where('Antesesora','=',$id)->count();
    }
}
