@extends('adminlte::page')

@section('title', 'Sikahim | Kalender')

@section('content_header')
    <x-header title="Kalender" breadcrumb="Kalender" />
@stop

@section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="card card-primary">
                <div class="card-body p-2">
                    <div class="position-relative">
                        Coba
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card card-primary">
                <div class="card-body p-0">
                    <div id="calendar"></div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('css')

@endsection

@section('js')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            initialView: 'dayGridMonth',
            events: '/admin/list-kegiatan',
            editable: true,
            droppable: true,
        });
        calendar.render();
    });
</script>
@endsection
