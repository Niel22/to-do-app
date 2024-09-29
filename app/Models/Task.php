<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'task_title',
        'slug',
        'task_description',
        'due_date',
        'priority',
        'notification_time',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
