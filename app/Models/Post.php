<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // Define the associated table name
    protected $table = 'posts';

    // Enable timestamps
    public $timestamps = true;

    // Custom names for created/updated timestamp columns
    const CREATED_AT = 'createdAt';
    const UPDATED_AT = 'updatedAt';
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
    // Fillable fields for mass assignment
    protected $fillable = [
        'categoryId',
        'userId',
        'authorId',
        'parentId',
        'title',
        'metaTitle',
        'slug',
        'summary',
        'published',
        'publishedAt',
        'content',
        'image'
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class, 'userId');
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'authorId');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'categoryId');
    }

    public function parent()
    {
        return $this->belongsTo(Post::class, 'parentId');
    }

    public function children()
    {
        return $this->hasMany(Post::class, 'parentId');
    }
}
