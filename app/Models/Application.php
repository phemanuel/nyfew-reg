<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'user_id',
        'stage',
        'comment',
        'status',
        'content',
        'content1',
        'file_size',
        'file_size1',
        'reviewed_at',
        'video_option',
        'p1_link1',
        'p1_link2',
        'p1_link3',
        'p1_link4',
        'p2_link1',
        'p2_link2',
        'p2_link3',
        'p2_link4',
        'p1',
        'p2',


    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
