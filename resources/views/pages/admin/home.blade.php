@extends('adminlte::page')

@section('title', 'Sikahim | Dashboard')

@section('content_header')
    <x-header title="Dashboard" breadcrumb="Dashboard" />
@stop

@section('content')
    <div class="row">
        <div class="col-md-6 col-lg-4">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <p class="card-title text-bold">Buat Kegiatan</p> <br>
                </div>
                <div class="card-body custom-bg1">
                    <h6 class="text-black font-bold mt-5">Mulai membuat kegiatan baru di aplikasi</h6>
                </div>
                <a href="create-kegiatan">
                    <div class="card-footer card-primary text-center hover:bg-gray-950">
                        Ke halaman <b>Buat Kegiatan</b>
                        <i class="fas fa-arrow-right text-primary px-1"></i>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-md-6 col-lg-4">
            <div class="card card-outline card-warning">
                <div class="card-header">
                    <p class="card-title text-bold">List Kegiatan</p>
                </div>
                <div class="card-body custom-bg2">
                    <h6 class="text-black font-bold mt-5">Lihat list kegiatan yang terdaftar di aplikasi</h6>
                </div>
                <a href="list-kegiatan">
                    <div class="card-footer card-primary text-center hover:bg-gray-950">
                        Ke halaman <b>List Kegiatan</b>
                        <i class="fas fa-arrow-right text-primary px-1"></i>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-md-6 col-lg-4">
            <div class="card card-outline card-success">
                <div class="card-header">
                    <p class="card-title text-bold">Kelola Pengguna</p>
                </div>
                <div class="card-body custom-bg3">
                    <h6 class="text-black font-bold mt-5 text">Kelola pengguna yang terdaftar di aplikasi</h6>
                </div>
                <a href="list-kegiatan">
                    <div class="card-footer card-primary text-center hover:bg-gray-950">
                        Ke halaman <b>Kelola Pengguna</b>
                        <i class="fas fa-arrow-right text-primary px-1"></i>
                    </div>
                </a>
            </div>
        </div>
    </div>
@stop

@section('adminlte_css')
    <style>
        .custom-bg1 {
            background-image: url('/images/thumb1.jpg');
            background-size: cover;
            background-position: center;
            position: relative;
        }
        
        .custom-bg2 {
            background-image: url('/images/thumb2.jpg');
            background-size: cover;
            background-position: center;
            position: relative;
        }

        .custom-bg3 {
            background-image: url('/images/thumb3.jpg');
            background-size: cover;
            background-position: center;
            position: relative;
        }

        .custom-bg1 .custom-bg2 .custome-bg2 h6 {
            position: relative;
            z-index: 1;
        }
    </style>
@stop

@section('footer')
    @include('components.footer')
@endsection