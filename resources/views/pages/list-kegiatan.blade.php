@extends('adminlte::page')

@section('title', 'Sikahim | Kelola Kegiatan')

@section('content_header')
    <x-header title="List Kegiatan" breadcrumb="List Kegiatan" />
@stop

@section('content')
    @section('plugins.Datatables', true)
    @section('plugins.DatatablesPlugins', true)
        @php
            $btnEdit = '<button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                            <i class="fa fa-lg fa-fw fa-pen"></i>
                        </button>';
            $btnDelete = '<button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
                            <i class="fa fa-lg fa-fw fa-trash"></i>
                        </button>';
            $btnDetails = '<button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
                            <i class="fa fa-lg fa-fw fa-eye"></i>
                        </button>';

            $heads = [
                'Nama Kegiatan',
                'Kategori',
                'Tanggal',
                'Lokasi',
                'Pelaksana',
                'Kuota',
                'Status',
                'Verifikasi',
                ['label' => 'Aksi', 'no-export' => true, 'width' => 10],
            ];

            $config = [
                'data' => [
                    ['Kajian Islam dan Teknologi', 'Kajian', '2024-12-10', 'Masjid Raya', 'Aga Group', 100, '<span class="badge badge-success">Selesai</span>', '<span class="badge badge-success">Terverifikasi</span>', '<nobr>'.$btnEdit.$btnDelete.$btnDetails.'</nobr>'],
                    ['Mentoring Karakter Berbasis Agama', 'Pelatihan', '2024-12-15', 'Gedung Pelatihan', 'Budi Group', 50, '<span class="badge badge-warning">Berlangsung</span>', '<span class="badge badge-success">Terverifikasi</span>', '<nobr>'.$btnEdit.$btnDelete.$btnDetails.'</nobr>'],
                    ['Lomba Baca dan Tulis Al-Qur\'an', 'Kompetisi', '2024-12-20', 'Lapangan Kota', 'Citra Group', 200, '<span class="badge badge-primary">Baru</span>', '<span class="badge badge-warning">Belum Terverifikasi</span>', '<nobr>'.$btnEdit.$btnDelete.$btnDetails.'</nobr>'],
                ],
                'order' => [[2, 'asc']],
                'columns' => [null, null, null, null, null, null, null, null, ['orderable' => false]],
            ];
        @endphp

        <x-adminlte-datatable id="table-kegiatan" :heads="$heads" :config="$config" head-theme="dark" footer-theme="dark" with-footer with-buttons hoverable />
@stop

@section('footer')
    @include('components.footer')
@endsection
