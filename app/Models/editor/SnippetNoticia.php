<?php

namespace App\Models\editor;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SnippetNoticia extends Model
{
    use HasFactory;
    protected $primaryKey = 'Id';

    protected $table = 'snippet_noticia';
    public $timestamps = false;

    protected $fillable = [
        'Titulo',
        'Descripcion',
        'Snippet',
        'Url',
    ];
}
