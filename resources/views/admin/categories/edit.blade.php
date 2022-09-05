@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Editar Categoria</h1>
@stop

@section('content')
@if (session('success'))
<div class="alert alert-success">
    {{session('success')}}
</div>
@endif
<div class="card">
    <div class="card-body">
        
        {!! Form::model($category,['route' => ['admin.categories.update',$category],'method'=>'PUT']) !!}
        <div class="mb-3">
            {!! Form::label("name", "Nombre", ['class'=> '']) !!}
            {!! form::text("name", null, ['class' => 'form-control' , 'placeholder' => 'Ingrese el nombre de la Categoria']) !!}
            @error('name')
            <span class="text-danger">
                <strong>{{ $message }}</strong>
            </span>

            @enderror
        </div>
        <div class="mb-3">
            {!! Form::label("slug", "Slug", ['class'=> '']) !!}
            {{ form::text("slug", null, ['class' => 'form-control' , 'placeholder' => 'Ingrese del Slug','readonly']) }}
            @error('slug')
            <span class="text-danger">
                <strong>{{ $message }}</strong>
            </span>

            @enderror
        </div>


        {!! Form::submit("Crear Categoria", ['class' => 'btn btn-primary']) !!}



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