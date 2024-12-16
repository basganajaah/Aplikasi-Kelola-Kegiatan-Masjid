<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    use HasFactory;

    protected $table = 'kegiatan';

    protected $fillable = [
        'thumbnail',
        'activity_name',
        'penyelenggara',
        'category_id',
        'datetime_started',
        'datetime_finished',
        'max_participant',
        'location',
        'description',
        'materi',
    ];

    public function categories()
    {
        return $this->belongsTo(Kategori::class, 'kegiatan', 'activity_id', 'category_id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'memiliki_tag', 'activity_id', 'tag_id');
    }
}

