<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Creation extends Model
{
    use HasFactory;

    protected $table = 'creations';
    protected $fillable = [
        'name',
        'image',
        'author',
        'source',
        'status',
        'description',
        'version'
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

}
