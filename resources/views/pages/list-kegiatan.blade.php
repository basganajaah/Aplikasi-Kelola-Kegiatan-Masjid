@extends('adminlte::page')

@section('title', 'Sikahim | List Kegiatan')

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
                'Penyelenggara',
                'Kuota',
                'Status',
                'Verifikasi',
                ['label' => 'Aksi', 'no-export' => true, 'width' => 10],
            ];

            $config = [
                'data' => $kegiatan->map(function ($item) use ($btnEdit, $btnDelete, $btnDetails) {
                    return [
                        $item->activity_name,
                        $item->Kategori->category_name ?? 'Tidak Ada Kategori',
                        $item->datetime_started->format('Y-m-d'),
                        $item->location,
                        $item->penyelenggara,
                        $item->max_participant ?? 'Tidak Ada',
                        '<span class="badge badge-' . ($item->status == 'Selesai' ? 'success' : ($item->status == 'Berlangsung' ? 'warning' : ($item->status == 'Belum Mulai' ? 'info' : ($item->status == 'Cancelled' ? 'danger' : 'secondary')))) . '">' . $item->status . '</span>',
                        '<span class="badge badge-' . ($item->verification == 'Terverifikasi' ? 'success' : ($item->verification == 'Ditolak' ? 'danger' : ($item->verification == 'Belum Terverifikasi' ? 'warning' : 'secondary'))) . '">' . $item->verification . '</span>',
                        '<nobr>' . $btnEdit . $btnDelete . $btnDetails . '</nobr>',
                    ];
                })->toArray(),
                'order' => [[2, 'asc']],
                'columns' => [null, null, null, null, null, null, null, null, ['orderable' => false]],
            ];
        @endphp

        <x-adminlte-datatable id="table-kegiatan" :heads="$heads" :config="$config" head-theme="dark" footer-theme="dark" with-footer with-buttons hoverable />
@stop

@section('footer')
    @include('components.footer')
@endsection
