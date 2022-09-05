@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Crear Categoria</h1>
@stop

@section('content')
@if (session('success'))
<div class="alert alert-success">
    {{session('success')}}
</div>
@endif
<div class="card">
    <div class="card-body">
        {!! Form::open(['route' => ['admin.tags.store'],]) !!}
        @include('admin.tags.parties.form')

        {!! Form::submit("Crear Etiquetas", ['class' => 'btn btn-primary']) !!}



        {!! Form::close() !!}
    </div>
</div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script src="{{ asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $("#name").stringToSlug({
            setEvents: 'keyup keydown blur',
            getPut: '#slug',
            space: '-'
        });
    });
</script>
@stop
