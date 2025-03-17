<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function creator(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    protected static function boot()
{
    parent::boot();
        static::creating(function ($post) {
            if (Auth::check()) {
                $post->user_id = Auth::id();
            }
        });

        static::updating(function ($post) {
            if (Auth::check()) {
                $post->updated_by = Auth::id();
            }
        });
    } 
    
    public function scopeByAuthor($query, $user_id) // scope for User
    {
        return $query->where('user_id', $user_id);
    }

    public function scopeSearch($query, $search) // scope for Search
{
    return $query->where(function ($query) use ($search) {
        $query->where('title', 'like', '%' . $search . '%')
              ->orWhere('post_content', 'like', '%' . $search . '%');
    });
}
}
