<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class KegiatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kegiatanData = [
            [
                'activity_name' => 'Kajian Islam dan Teknologi',
                'category_id' => 1, // ID untuk kategori 'Kajian'
                'penyelenggara' => 'Aga Group',
                'datetime_started' => Carbon::parse('2024-12-10 09:00:00'),
                'datetime_finished' => Carbon::parse('2024-12-10 12:00:00'),
                'location' => 'Masjid Raya',
                'max_participant' => 100,
                'description' => 'Mendiskusikan peran Islam dalam perkembangan teknologi.',
                'status' => 'Belum Mulai',
                'verification' => 'Terverifikasi',
                'tags' => ['Islam', 'Teknologi', 'Islami'],
            ],
            [
                'activity_name' => 'Lomba Baca dan Tulis Al-Qur\'an',
                'category_id' => 2, // ID untuk kategori 'Kompetisi'
                'penyelenggara' => 'Citra Group',
                'datetime_started' => Carbon::parse('2024-12-20 08:00:00'),
                'datetime_finished' => Carbon::parse('2024-12-20 17:00:00'),
                'location' => 'Lapangan Kota',
                'max_participant' => 200,
                'description' => 'Kompetisi untuk menguji kemampuan membaca dan menulis Al-Qur\'an.',
                'status' => 'Belum Mulai',
                'verification' => 'Menunggu verifikasi',
                'tags' => ['Al-Qur\'an', 'Lomba', 'Belajar'],
            ],
            [
                'activity_name' => 'Pelatihan Manajemen Waktu Islami',
                'category_id' => 3, // ID untuk kategori 'Pelatihan'
                'penyelenggara' => 'Budi Group',
                'datetime_started' => Carbon::parse('2024-12-15 10:00:00'),
                'datetime_finished' => Carbon::parse('2024-12-15 15:00:00'),
                'location' => 'Gedung Pelatihan',
                'max_participant' => 50,
                'description' => 'Pelatihan untuk mengelola waktu dengan prinsip Islam.',
                'status' => 'Berlangsung',
                'verification' => 'Terverifikasi',
                'tags' => ['Belajar', 'Mengaji', 'Dakwah'],
            ],
            [
                'activity_name' => 'Aksi Sosial Solidaritas Umat',
                'category_id' => 4, // ID untuk kategori 'Sosial'
                'penyelenggara' => 'Relawan Peduli',
                'datetime_started' => Carbon::parse('2024-12-22 08:00:00'),
                'datetime_finished' => Carbon::parse('2024-12-22 14:00:00'),
                'location' => 'Kampung Harapan',
                'max_participant' => 150,
                'description' => 'Kegiatan sosial untuk membantu masyarakat kurang mampu.',
                'status' => 'Belum Mulai',
                'verification' => 'Terverifikasi',
                'tags' => ['Solidaritas', 'Kebersamaan', 'Sosial'],
            ],
        ];

        foreach ($kegiatanData as $data) {
            // Insert kegiatan
            $kegiatanId = DB::table('kegiatan')->insertGetId([
                'category_id' => $data['category_id'],
                'activity_name' => $data['activity_name'],
                'penyelenggara' => $data['penyelenggara'],
                'datetime_started' => $data['datetime_started'],
                'datetime_finished' => $data['datetime_finished'],
                'location' => $data['location'],
                'max_participant' => $data['max_participant'],
                'description' => $data['description'],
                'status' => $data['status'],
                'verification' => $data['verification'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Attach tags via pivot table (memiliki_tag)
            $tagIds = DB::table('tag')
                ->whereIn('tag_name', $data['tags'])
                ->pluck('tag_id')
                ->toArray();

            foreach ($tagIds as $tagId) {
                DB::table('memiliki_tag')->insert([
                    'activity_id' => $kegiatanId,
                    'tag_id' => $tagId,
                ]);
            }
        }
    }
}
