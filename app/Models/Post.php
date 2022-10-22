<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'completed',
        'user_id'
    ];

    public function users() {
        return $this->belongsTo(User::class);
    }
}
