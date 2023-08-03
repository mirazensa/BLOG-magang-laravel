<?php

namespace App\Models;

use App\Models\Tag;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cviebrock\EloquentSluggable\Sluggable;

class Article extends Model
{
    use HasFactory;
    use Sluggable;
    protected $guarded = ['id'];

    //satu artikel punya satu user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //satu artikel punya satu kategori
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    //satu artikel punya banyak tag
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'judul'
            ]
        ];
    }
}
