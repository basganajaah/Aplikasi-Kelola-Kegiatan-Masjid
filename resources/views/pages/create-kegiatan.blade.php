@extends('adminlte::page')

@section('title', 'Sikahim | Buat Kegiatan')

@section('content_header')
    <x-header title="Buat Kegiatan" breadcrumb="Buat Kegiatan" />
@stop

@section('content')
    @section('plugins.Select2', true)
    @section('plugins.Sweetalert2', true)
    @section('plugins.TempusDominus', true)
    @section('plugins.BsCustomFileInput', true)
        
    <div class="row">
        <!-- Bagian Kiri -->
        <div class="col-md-6">
            <x-adminlte-input-file name="ifLabel" label="Thumbnail Kegiatan" placeholder="Upload file" disable-feedback/>
            
            <div class="form-group">
                <label for="nama_kegiatan">Nama Kegiatan <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan" placeholder="Nama Kegiatan" required>
            </div>
            
            <div class="form-group">
                <label for="penyelenggara">Nama Penyelenggara <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="penyelenggara" name="penyelenggara" placeholder="Penyelenggara" required>
            </div>

            <x-adminlte-select2 name="sel2Vehicle" label="Kategori" label-class="text-black"
                igroup-size="md" data-placeholder="Pilih opsi kategori" required>
                <x-slot name="prependSlot">
                    <div class="input-group-text bg-gradient-info">
                        <i class="fas fa-tag"></i>
                    </div>
                </x-slot>
                <option/>
                <option>Kajian</option>
                <option>Kompetisi</option>
                <option>Pelatihan</option>
                <option>Sosial</option>
            </x-adminlte-select2>

            @php
                $config = [
                    "placeholder" => "Pilih opsi tags",
                    "allowClear" => true,
                ];
            @endphp
            <x-adminlte-select2 id="sel2Category" name="sel2Category[]" label="Tags (Optional)"
                label-class="text-black" igroup-size="md" :config="$config" multiple required>
                <x-slot name="prependSlot">
                    <div class="input-group-text bg-gradient-info">
                        <i class="fas fa-tags"></i>
                    </div>
                </x-slot>
                <x-slot name="appendSlot">
                    <x-adminlte-button theme="outline-dark" label="Hapus" icon="fas fa-lg fa-ban text-danger"/>
                </x-slot>
                <option>Mengaji</option>
                <option>Dakwah</option>
                <option>Islami</option>
                <option>Lomba</option>
                <option>Solidaritas</option>
            </x-adminlte-select2>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="tanggal_mulai">Tanggal Mulai <span class="text-danger">*</span></label>
                <input type="text" class="form-control datetimepicker" id="tanggal_mulai" name="tanggal_mulai" placeholder="Tanggal Mulai" required>
            </div>

            <div class="form-group">
                <label for="tanggal_selesai">Tanggal Selesai <span class="text-danger">*</span></label>
                <input type="text" class="form-control datetimepicker" id="tanggal_selesai" name="tanggal_selesai" placeholder="Tanggal Selesai" required>
            </div>

            <div class="form-group">
                <label for="kuota">Kuota Peserta <span class="text-danger">*</span></label>
                <input type="number" class="form-control" id="kuota" name="kuota" placeholder="Kuota Peserta" required>
            </div>

            <div class="form-group">
                <label for="lokasi">Lokasi <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="lokasi" name="lokasi" placeholder="Lokasi" required>
            </div>

            <x-adminlte-input-file name="ifLabel" label="File Materi (Optional)" placeholder="Upload file" disable-feedback/>

            <div class="form-group">
                <label for="deskripsi">Deskripsi <span class="text-danger">*</span></label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" placeholder="Deskripsi Kegiatan" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary mb-5" id="submitBtn">Submit</button>
        </div>
    </div>
@stop

@section('footer')
    @include('components.footer')
@endsection

@section('js')
    <script>
        $(document).ready(function() {

            // Inisialisasi DateTimePicker
            $('.datetimepicker').daterangepicker({
                singleDatePicker: true,
                timePicker: true,
                timePicker24Hour: true,
                locale: {
                    format: 'YYYY-MM-DD HH:mm'
                }
            });

            // Handling submit button
            $('#submitBtn').click(function(e) {
                e.preventDefault();

                // Validasi data yang wajib diisi
                var isValid = true;

                if ($('#nama_kegiatan').val() === '') {
                    isValid = false;
                }
                if ($('#kategori').val() === null) {
                    isValid = false;
                }
                if ($('#penyelenggara').val() === '') {
                    isValid = false;
                }
                if ($('#tanggal_mulai').val() === '') {
                    isValid = false;
                }
                if ($('#tanggal_selesai').val() === '') {
                    isValid = false;
                }
                if ($('#kuota').val() === '') {
                    isValid = false;
                }
                if ($('#lokasi').val() === '') {
                    isValid = false;
                }
                if ($('#deskripsi').val() === '') {
                    isValid = false;
                }

                // Jika semua data wajib diisi, tampilkan SweetAlert2
                if (isValid) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Kegiatan Berhasil Dibuat',
                        text: 'Data kegiatan telah berhasil disubmit.',
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Pastikan semua data yang wajib diisi telah terisi!',
                    });
                }
            });
        });
    </script>
@endsection
