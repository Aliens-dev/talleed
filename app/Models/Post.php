<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class,"author_id");
    }

    public function comments()
    {
        return $this->hasMany(Comment::class,"post_id");
    }

    public function category()
    {
        return $this->belongsTo(Category::class,"category_id");
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class,"post_tags","post_id","tag_id");
    }

    public function images()
    {
        return $this->morphMany(Comment::class,"imageable","imageable_type","imageable_id");
    }

    public function visitors()
    {
        return $this->hasMany(Visitor::class, 'post_id');
    }

    public function scopePublished($query) {
        return $query->where('status', 'published');
    }

    public function scopePending($query) {
        return $query->where('status', 'pending');
    }

    public function scopeDraft($query) {
        return $query->where('status', 'draft');
    }

    public function scopeLatests($query, $num=5) {
        return $query->published()->take($num)->orderByDesc('created_at');
    }

    public function scopeTopRead($query, $num = 5)
    {
        return $query->published()->withCount('visitors')->orderByDesc('visitors_count')->take($num);
    }

}
