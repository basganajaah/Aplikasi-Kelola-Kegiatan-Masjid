<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Kegiatan extends Model
{
    use HasFactory;

    protected $table = 'kegiatan';
    protected $primaryKey = 'activity_id';
    public $incrementing = true;
    protected $keyType = 'int';

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

    protected $casts = [
        'datetime_started' => 'datetime',
        'datetime_finished' => 'datetime',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'category_id', 'category_id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'memiliki_tag', 'activity_id', 'tag_id');
    }
}

