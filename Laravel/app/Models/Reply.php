<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reply extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'post_id',
        'feedback_id',
        'reply_content',
        'reply_photo',
        'created_user_id',
        'updated_user_id',
        'deleted_user_id'
    ];

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    protected $table = 'replies';

    public function feedback()
    {
        return $this->belongsTo(Feedback::class);
    }
}
