@extends('adminlte::page')

@section('title', 'Kelola Kegiatan')

@section('content_header')
    <x-content-header title="Buat Kegiatan" breadcrumb="Buat Kegiatan" />
@stop

@section('content')
    <div class="row">
        <div class="col-md-6 col-lg-4">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <p class="card-title text-bold">Kegiatan</p>
                    <div class="card-tools">
                        <span class="badge badge-primary">Baru</span>
                    </div>
                </div>
                <div class="card-body">
                    <h2>10</h2>
                    <h6>Kegiatan baru</h6>
                </div>
                <a href="list-kegiatan">
                    <div class="card-footer card-primary text-center hover:bg-gray-950">
                        Info selengkapnya
                    </div>
                </a>
            </div>
        </div>
        <div class="col-md-6 col-lg-4">
            <div class="card card-outline card-warning">
                <div class="card-header">
                    <p class="card-title text-bold">Kegiatan</p>
                    <div class="card-tools">
                        <span class="badge badge-warning">Berlangsung</span>
                    </div>
                </div>
                <div class="card-body">
                    <h2>5</h2>
                    <h6>Kegiatan berlangsung</h6>
                </div>
                <a href="list-kegiatan">
                    <div class="card-footer card-primary text-center hover:bg-gray-950">
                        Info selengkapnya
                    </div>
                </a>
            </div>
        </div>
        <div class="col-md-6 col-lg-4">
            <div class="card card-outline card-success">
                <div class="card-header">
                    <p class="card-title text-bold">Kegiatan</p>
                    <div class="card-tools">
                        <span class="badge badge-success">Selesai</span>
                    </div>
                </div>
                <div class="card-body">
                    <h2>10</h2>
                    <h6>Kegiatan selesai</h6>
                </div>
                <a href="list-kegiatan">
                    <div class="card-footer card-primary text-center hover:bg-gray-950">
                        Info selengkapnya
                    </div>
                </a>
            </div>
        </div>
    </div>
@stop
