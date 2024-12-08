@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <x-header title="Dashboard" breadcrumb="Dashboard" />
@stop

@section('adminlte_css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('footer')
    @include('components.footer')
@endsection