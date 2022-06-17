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


    public function chapters()
    {
        return $this->hasMany(Chapter::class);
    }
    
    public function users()
    {
        return $this->belongsToMany(User::class, 'following_creations');
    }

    public static function isFollowed($id)
    {
       echo 'called' + $id;
    }
}
