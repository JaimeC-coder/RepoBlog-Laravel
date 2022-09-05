@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
   <a href="{{ route('admin.posts.create')}}" class="btn btn-primary btn-sm float-right">Nuevo Post</a>
   <h1>Listado de Post</h1>
@stop

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif


    @livewire('admin.posts-index')

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
