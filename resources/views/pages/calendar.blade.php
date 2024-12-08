@extends('adminlte::page')

@section('title', 'Sikahim | Calendar')

@section('content_header')
    <x-header title="Calendar" breadcrumb="Calendar" />
@stop

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-body p-0">
                <!-- FullCalendar Element -->
                <div id="calendar"></div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('css')
    <!-- Include additional styling if needed -->
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
            events: '/your-events-route', // URL untuk memuat event
            editable: true, // Aktifkan fitur drag-and-drop
            droppable: true, // Aktifkan kemampuan untuk menjatuhkan event dari luar kalender
        });
        calendar.render();
    });
</script>
@endsection
