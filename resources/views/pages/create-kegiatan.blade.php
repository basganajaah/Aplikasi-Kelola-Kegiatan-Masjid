@extends('adminlte::page')

@section('title', 'Sikahim | Buat Kegiatan')

@section('content_header')
    <x-header title="Buat Kegiatan" breadcrumb="Buat Kegiatan" />
@stop

@section('content')
    @section('plugins.Select2', true)
    @section('plugins.Sweetalert2', true)
    @section('plugins.BsCustomFileInput', true)
    @section('plugins.TempusDominusBs4', true)
        
    <div class="row">
        <!-- Bagian Kiri -->
        <div class="col-md-6">
            <x-adminlte-input-file id="ifMultiple" name="ifMultiple[]" label="Thumbnail Kegiatan"
                placeholder="Upload single file" igroup-size="md" legend="Browse" multiple>
                <x-slot name="prependSlot">
                    <div class="input-group-text text-dark">
                        <i class="fas fa-file-upload"></i>
                    </div>
                </x-slot>
            </x-adminlte-input-file>
            
            <x-adminlte-input name="iUser" label="Nama Kegiatan" placeholder="Masukkan nama kegiatan" label-class="text-dark" required>
                <x-slot name="prependSlot">
                    <div class="input-group-text">
                        <i class="fas fa-file-signature text-dark"></i>
                    </div>
                </x-slot>
            </x-adminlte-input>
            
            <x-adminlte-input name="iUser" label="Nama Kegiatan" placeholder="Masukkan nama penyelenggara" label-class="text-dark" required>
                <x-slot name="prependSlot">
                    <div class="input-group-text">
                        <i class="fas fa-users text-dark"></i>
                    </div>
                </x-slot>
            </x-adminlte-input>
            
            <div class="row">
                <div class="col-md-4">
                    <x-adminlte-select2 name="sel2Vehicle" label="Kategori *" label-class="text-black"
                        igroup-size="md" data-placeholder="Pilih kategori" required>
                        <x-slot name="prependSlot">
                            <div class="input-group-text">
                                <i class="fas fa-tag text-dark"></i>
                            </div>
                        </x-slot>
                        <option/>
                        <option>Kajian</option>
                        <option>Kompetisi</option>
                        <option>Pelatihan</option>
                        <option>Sosial</option>
                    </x-adminlte-select2>
                </div>
                <div class="col-md-8">
                    @php
                        $config = [
                            "placeholder" => "Tambahkan tags",
                            "allowClear" => true,
                        ];
                    @endphp
                    <x-adminlte-select2 id="sel2Category" name="sel2Category[]" label="Tags (Optional)"
                        label-class="text-black" igroup-size="md" :config="$config" multiple>
                        <x-slot name="prependSlot">
                            <div class="input-group-text bg-black">
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
            </div>
        </div>

        <div class="col-md-6">
            <div class="row">
                <div class="col-md-6">
                    @php
                        $configStart = ['format' => 'DD/MM/YYYY HH:mm'];
                    @endphp
                    <x-adminlte-input-date name="idLabel1" :config="$configStart" placeholder="Pilih Tanggal"
                        label="Tanggal Mulai" label-class="text-dark">
                        <x-slot name="appendSlot">
                            <x-adminlte-button theme="outline-dark" icon="fas fa-lg fa-calendar"
                                title="Set Date Started"/>
                        </x-slot>
                    </x-adminlte-input-date>
                </div>
                <div class="col-md-6">
                    @php
                        $configFinished = ['format' => 'DD/MM/YYYY HH:mm'];
                    @endphp
                    <x-adminlte-input-date name="idLabel2" :config="$configFinished" placeholder="Pililh Tanggal"
                        label="Tanggal Selesai" label-class="text-dark">
                        <x-slot name="appendSlot">
                            <x-adminlte-button theme="outline-dark" icon="fas fa-lg fa-calendar"
                                title="Set Date Finished"/>
                        </x-slot>
                    </x-adminlte-input-date>
                </div>
            </div>

            <div class="form-group">
                <label for="kuota">Kuota Peserta <span class="text-danger">*</span></label>
                <input type="number" class="form-control" id="kuota" name="kuota" placeholder="Kuota Peserta" required>
            </div>

            <div class="form-group">
                <label for="lokasi">Lokasi <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="lokasi" name="lokasi" placeholder="Lokasi" required>
            </div>

            <x-adminlte-input-file id="ifMultiple" name="ifMultiple[]" label="Materi Kegiatan (Optional)"
                placeholder="Upload multiple files" igroup-size="md" legend="Browse" multiple>
                <x-slot name="prependSlot">
                    <div class="input-group-text text-dark">
                        <i class="fas fa-file-upload"></i>
                    </div>
                </x-slot>
            </x-adminlte-input-file>

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
