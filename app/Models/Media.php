<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;
    protected $fillable=[
        'media',
        'categories_id'
    ];

    public function categories()
    {
        return $this->belongsTo(Categories::class);
    }
}
