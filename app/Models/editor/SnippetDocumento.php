<?php

namespace App\Models\editor;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SnippetDocumento extends Model
{
    use HasFactory;
    protected $primaryKey = 'Id';

    protected $table = 'snippet_documento';
    public $timestamps = false;

    protected $fillable = [
        'Descripcion',
        'Snippet',
        'Url',
    ];
}
