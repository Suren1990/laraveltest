<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{
    use HasFactory;
    protected $guarded = [];
    // protected $fillable = ['title', 'post_content']; 
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
}
