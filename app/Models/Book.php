<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'pages',
        'editor_id'
    ];

    public function editors()
    {
        return $this->belongsTo(Editor::class, 'editor_id');
    }

    public function authors()
    {
        return $this->belongsToMany(Author::class);
    }
}
