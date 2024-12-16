<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = [
            ['tag_name' => 'Islam'],
            ['tag_name' => 'Teknologi'],
            ['tag_name' => 'Al-Qur\'an'],
            ['tag_name' => 'Hadis'],
            ['tag_name' => 'Fikih'],
            ['tag_name' => 'Akhlak'],
            ['tag_name' => 'Sejarah Islam'],
            ['tag_name' => 'Tafsir'],
            ['tag_name' => 'Mengaji'],
            ['tag_name' => 'Dakwah'],
            ['tag_name' => 'Islami'],
            ['tag_name' => 'Solidaritas'],
            ['tag_name' => 'Kebersamaan'],
            ['tag_name' => 'Lomba'],
            ['tag_name' => 'Belajar'],
        ];

        foreach ($tags as $tag) {
            DB::table('tag')->updateOrInsert(
                ['tag_name' => $tag['tag_name']],
                $tag
            );
        }
    }
}
