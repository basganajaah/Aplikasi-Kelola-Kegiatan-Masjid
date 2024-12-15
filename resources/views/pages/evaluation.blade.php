@extends('adminlte::page')

@section('title', 'Sikahim | Evaluasi Kegiatan')

@section('content_header')
    <x-header title="Evaluasi Kegiatan" breadcrumb="Evaluasi Kegiatan" />
@stop

@section('content')
    <div class="container-fluid">
      <div class="row mb-0">
      </div>
    </div>
  </div>
  <div class="content">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-lg-10">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Formulir Evaluasi</h3>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="kritik">Kritik:</label>
                <textarea id="kritik" class="form-control" rows="5" placeholder="Masukkan kritik Anda di sini..."></textarea>
              </div>
              <div class="form-group">
                <label for="saran">Saran:</label>
                <textarea id="saran" class="form-control" rows="5" placeholder="Masukkan saran Anda di sini..."></textarea>
              </div>
              <div class="form-group">
                <label>Rating:</label>
                <div class="rating-stars">
                  <span data-value="1" class="text-gray"><i class="fa fa-star"></i></span>
                  <span data-value="2" class="text-gray"><i class="fa fa-star"></i></span>
                  <span data-value="3" class="text-gray"><i class="fa fa-star"></i></span>
                  <span data-value="4" class="text-gray"><i class="fa fa-star"></i></span>
                  <span data-value="5" class="text-gray"><i class="fa fa-star"></i></span>
                </div>
              </div>
            </div>
            <div class="card-footer text-center">
              <button id="submit" class="btn btn-primary" disabled>Kirim Evaluasi</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@stop

@section('js')
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.2.0/js/adminlte.min.js"></script>
<script>
  $(document).ready(function() {
    let selectedRating = 0;
    $(".rating-stars span").on("click", function() {
      selectedRating = $(this).data("value");
      $(".rating-stars span").removeClass("selected").addClass("text-gray");
      $(this).prevAll().addBack().removeClass("text-gray").addClass("selected");
      checkFormValidity();
    });
    $("#kritik, #saran").on("input", checkFormValidity);
    function checkFormValidity() {
      const kritik = $("#kritik").val().trim();
      const saran = $("#saran").val().trim();
      if (kritik && saran && selectedRating > 0) {
        $("#submit").prop("disabled", false);
      } else {
        $("#submit").prop("disabled", true);
      }
    }
    $("#submit").on("click", function() {
      const kritik = $("#kritik").val().trim();
      const saran = $("#saran").val().trim();
      alert(`Kritik: ${kritik}\nSaran: ${saran}\nRating: ${selectedRating} bintang`);
    });
  });
</script>
@stop

@section('css')
<style>
  .rating-stars span {
    cursor: pointer;
    font-size: 2rem;
  }
  .rating-stars span.selected {
    color: gold;
  }
</style>
@stop