<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $table = 'tag';

    protected $primaryKey = 'tag_id';

    protected $fillable = ['tag_name'];

    public function kegiatan()
    {
        return $this->belongsToMany(Kegiatan::class, 'memiliki_tag', 'tag_id', 'activity_id');
    }
}