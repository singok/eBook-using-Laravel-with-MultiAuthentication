<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    use HasFactory;

    protected $table = "books";

    protected $fillable = [
        "category",
        "title",
        "description",
        "cover_image",
        "file",
    ];
}
