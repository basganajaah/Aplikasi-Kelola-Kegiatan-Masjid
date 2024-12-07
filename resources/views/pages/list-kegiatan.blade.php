@extends('adminlte::page')

@section('title', 'Kelola Kegiatan')

@section('content_header')
    <x-content-header title="Dashboard" breadcrumb="List Kegiatan" />
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title text-bold">Data Tabel Dummy</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Kategori</th>
                            <th>Tanggal</th>
                            <th>Role</th>
                            <th>Telepon</th>
                            <th>Alamat</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $data = [
                                ['name' => 'Aga', 'email' => 'aga@example.com', 'role' => 'Admin', 'phone' => '081234567890', 'address' => 'Jl. Mangga No. 1', 'status' => 'Aktif'],
                                ['name' => 'Budi', 'email' => 'budi@example.com', 'role' => 'User', 'phone' => '081987654321', 'address' => 'Jl. Apel No. 2', 'status' => 'Non-Aktif'],
                                ['name' => 'Citra', 'email' => 'citra@example.com', 'role' => 'Moderator', 'phone' => '081123123123', 'address' => 'Jl. Durian No. 3', 'status' => 'Aktif'],
                            ];
                        @endphp
                        @foreach($data as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $item['name'] }}</td>
                                <td>{{ $item['email'] }}</td>
                                <td>{{ $item['role'] }}</td>
                                <td>{{ $item['phone'] }}</td>
                                <td>{{ $item['address'] }}</td>
                                <td>{{ $item['status'] }}</td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-warning m-2">Edit</button>
                                    <button class="btn btn-sm btn-danger m-2">Hapus</button>
                                    <button class="btn btn-sm btn-primary m-2">Evaluasi</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
