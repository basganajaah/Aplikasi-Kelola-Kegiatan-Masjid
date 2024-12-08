@extends('adminlte::page')

@section('title', 'Sikahim | Kelola Pengguna')

@section('content_header')
    <x-header title="Kelola Pengguna" breadcrumb="Kelola Pengguna" />
@stop

@section('content')
    @section('plugins.Datatables', true)
    @section('plugins.DatatablesPlugins', true)

    @php
        $heads = [
            'ID',
            'Username',
            ['label' => 'Email', 'width' => 40],
            ['label' => 'Actions', 'no-export' => true, 'width' => 5],
        ];

        $config = [
            'order' => [[1, 'asc']],
            'columns' => [
                ['data' => 'id'],
                ['data' => 'name'],
                ['data' => 'email'],
                ['data' => 'actions', 'orderable' => false],
            ],
            'ajax' => '/users',
        ];
    @endphp

    <x-adminlte-datatable id="users-table" :heads="$heads" :config="$config" head-theme="dark" footer-theme="dark" with-footer with-buttons hoverable />

@endsection

@section('footer')
    @include('components.footer')
@endsection
