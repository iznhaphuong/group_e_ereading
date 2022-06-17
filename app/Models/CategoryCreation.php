<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryCreation extends Model
{
    use HasFactory;

    protected $table = 'category_creation';
    protected $fillable = [
        'category_id',
        'creation_id'
    ];
}
