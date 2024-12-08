@extends('adminlte::page')

@section('title', 'Sikahim | Kelola Kegiatan')

@section('content_header')
    <x-header title="Dashboard Kegiatan" breadcrumb="Dashboard Kegiatan" />
@stop

@section('content')
    <div class="row">
        <div class="col-md-6 col-lg-4">
            <x-adminlte-small-box title="2" text="Kegiatan Baru" icon="fas fa-search-plus" theme="primary" url="list-kegiatan" url-text="Selengkapnya"/>
        </div>
        <div class="col-md-6 col-lg-4">
            <x-adminlte-small-box title="1" text="Kegiatan Berlangsung" icon="fas fa-hourglass-half" theme="warning" url="list-kegiatan" url-text="Selengkapnya"/>
        </div>
        <div class="col-md-6 col-lg-4">
            <x-adminlte-small-box title="5" text="Kegiatan Selesai" icon="fas fa-check-double" theme="success" url="list-kegiatan" url-text="Selengkapnya"/>
        </div>
    </div>
@stop

@section('footer')
    @include('components.footer')
@endsection
