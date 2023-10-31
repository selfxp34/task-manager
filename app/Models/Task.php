<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{

    use HasFactory;

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function comments(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Comment::class, 'task_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    protected $attributes = [
        'image' => 'default.jpg',
    ];
}
