<?php

namespace App\Models\editor;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Snippet extends Model
{
    use HasFactory;
    protected $primaryKey = 'Id';

    protected $table = 'snippets';

    protected $fillable = [
        'html_content',
        'css_content',
        //'json_content',
    ];


}
