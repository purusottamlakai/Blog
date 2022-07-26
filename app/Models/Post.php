<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'title',
        'body',
        'user_id',
        'slug',
        'category_id',

    ];
    protected $with=['ratings'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class,'post_id','id');
    }
    public function ratings()
    {
        return $this->hasMany(Rating::class,'post_id','id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
}

