<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;
    protected $fillable=[
        'title'
    ];
    public function media()
    {
        return $this->hasMany(Media::class);
    }
}
