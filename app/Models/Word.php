<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Word extends Model
{
    protected $table = 'words';
    protected $fillable = [
        'course_id',
        'type_of_word',
        'meaning_of_word',
        'transcription',
        'url_image_word'
    ];
}
