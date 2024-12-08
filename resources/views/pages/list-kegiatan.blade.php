@extends('adminlte::page')

@section('title', 'Kelola Kegiatan')

@section('content_header')
    <x-content-header title="List Kegiatan" breadcrumb="List Kegiatan" />
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title text-bold">Tabel Kegiatan</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="bg-navy disabled">
                        <tr class="text-center">
                            <th>Nama</th>
                            <th>Kategori</th>
                            <th>Tanggal</th>
                            <th>Lokasi</th>
                            <th>Pelaksana</th>
                            <th>Kuota</th>
                            <th>Status</th>
                            <th>Verifikasi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $data = [
                                ['name' => 'Kajian Islam dan Teknologi', 'category' => 'Kajian', 'date' => '2024-12-10', 'location' => 'Masjid Raya', 'status' => 'Selesai', 'verification' => 'Terverifikasi', 'organizer' => 'Aga Group', 'quota' => 100],
                                ['name' => 'Mentoring Karakter Berbasis Agama', 'category' => 'Pelatihan', 'date' => '2024-12-15', 'location' => 'Gedung Pelatihan', 'status' => 'Berlangsung', 'verification' => 'Terverifikasi', 'organizer' => 'Budi Group', 'quota' => 50],
                                ['name' => 'Lomba Baca dan Tulis Al-Qur`an', 'category' => 'Kompetisi', 'date' => '2024-12-20', 'location' => 'Lapangan Kota', 'status' => 'Baru', 'verification' => 'Belum Terverifikasi', 'organizer' => 'Citra Group', 'quota' => 200],
                            ];
                        @endphp
                        @foreach($data as $item)
                            <tr>
                                <td>{{ $item['name'] }}</td>
                                <td>{{ $item['category'] }}</td>
                                <td>{{ $item['date'] }}</td>
                                <td>{{ $item['location'] }}</td>
                                <td>{{ $item['organizer'] }}</td>
                                <td>{{ $item['quota'] }}</td>
                                <td class="text-center">
                                    <!-- Status Badge -->
                                    @if($item['status'] == 'Selesai')
                                        <span class="badge badge-success">{{ $item['status'] }}</span>
                                    @elseif($item['status'] == 'Berlangsung')
                                        <span class="badge badge-warning">{{ $item['status'] }}</span>
                                    @else
                                        <span class="badge badge-primary">{{ $item['status'] }}</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <!-- Verifikasi Badge -->
                                    @if($item['verification'] == 'Terverifikasi')
                                        <span class="badge badge-success">{{ $item['verification'] }}</span>
                                    @else
                                        <span class="badge badge-warning">{{ $item['verification'] }}</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-warning my-1">Edit</button>
                                    <button class="btn btn-sm btn-danger my-1">Hapus</button>
                                    <button class="btn btn-sm btn-primary my-1">Evaluasi</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop

@section('footer')
    @include('components.footer')
@endsection
