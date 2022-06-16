<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    public function creation()
    {
        return $this->belongsTo('App\Models\Creation');
    }
}
