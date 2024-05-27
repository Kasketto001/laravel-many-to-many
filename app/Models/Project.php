<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'description', 'author', 'thumb', 'type_id', 'link_repository', 'link_preview'];


    public function type()
    {
        return $this->belongsTo(Type::class);
    }
}
