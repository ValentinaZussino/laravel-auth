<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Project extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'slug', 'description','dev_lang', 'framework', 'difficulty', 'team', 'git_link'];

    public static function generateSlug($title)
    {
        return Str::slug($title, '-');
    }
}
