<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContentMeta extends Model
{
    use HasFactory;
    protected $fillable = ['content_id', 'content_group_id'];
}
