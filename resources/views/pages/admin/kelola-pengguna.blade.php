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

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).on('click', '.delete-btn', function() {
            var userId = $(this).data('id'); // Mendapatkan ID pengguna

            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: 'Pengguna ini akan dihapus!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Hapus',
                cancelButtonText: 'Batal',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    // Jika dikonfirmasi, kirim request delete ke server
                    $.ajax({
                        url: '/users/' + userId,
                        type: 'DELETE',
                        data: {
                            "_token": "{{ csrf_token() }}",
                        },
                        success: function(response) {
                            Swal.fire(
                                'Dihapus!',
                                response.message,
                                'success'
                            )
                            // Refresh atau hapus row yang telah dihapus dari tabel
                            location.reload(); // Refresh halaman untuk melihat perubahan
                        },
                        error: function(response) {
                            Swal.fire(
                                'Gagal!',
                                'Terjadi kesalahan saat menghapus pengguna.',
                                'error'
                            );
                        }
                    });
                }
            });
        });
    </script>
@stop
