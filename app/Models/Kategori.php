<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategori';

    protected $primaryKey = 'category_id';

    protected $fillable = ['category_name'];

    public function kegiatan()
    {
        return $this->belongsToMany(Kegiatan::class);
    }
}