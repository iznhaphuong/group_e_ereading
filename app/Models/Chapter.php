<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Chapter extends Model
{
    use HasFactory, SoftDeletes;

    public function creation()
    {
        return $this->belongsTo(Creation::class);
    }

    protected $fillable = [
        'chapter_name',
        'chapter_content',
        'creation_id',
        'chapter_version',
        'created_at',
        'updated_at',
    ];

    protected $hidden = [
        'chapter_version',
        'created_at',
        'updated_at',
    ];
}
