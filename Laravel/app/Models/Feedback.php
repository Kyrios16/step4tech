<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Feedback extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'post_id',
        'content',
        'photo',
        'green_mark',
        'created_user_id',
        'updated_user_id',
        'deleted_user_id'
    ];

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    protected $table = 'feedbacks';
}
