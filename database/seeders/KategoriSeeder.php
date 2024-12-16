<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['category_name' => 'Kajian'],
            ['category_name' => 'Kompetisi'],
            ['category_name' => 'Pelatihan'],
            ['category_name' => 'Sosial'],
        ];

        foreach ($categories as $category) {
            DB::table('kategori')->updateOrInsert(
                ['category_name' => $category['category_name']],
                $category
            );
        }
    }
}
