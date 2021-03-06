<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;
    protected $fillable = ['content_type', 'title', 'content', 'slug', 'featured_image'];
    
    public function contentMeta()
    {
        return $this->hasMany(ContentMeta::class);
    }
}
