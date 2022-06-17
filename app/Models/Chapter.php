<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    use HasFactory;

    public function creation()
    {
        return $this->belongsTo(Creation::class);
    }

    protected $fillable = [
        'chapter_name',
        'chapter_content',
        'chapter_version',
        'created_at',
        'updated_at',
    ];

    protected $hidden = [
        'version',
        'created_at',
        'updated_at',
    ];
}
