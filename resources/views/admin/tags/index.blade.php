@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Lista de Etiquetas</h1>
@stop

@section('content')
@if (session('success'))
<div class="alert alert-success">
    {{session('success')}}
</div>
@endif
<div class="card">
    <div class="card">
        <div class="card-header">
           
            <a href="{{route('admin.tags.create')}}" class="btn btn-secondary">Agregar Nueva Etiquetas</a>
        </div>
    </div>

    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Color</th>
                    <th colspan="2"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tags as $item)
                <tr>

                    <td> {{$item->id}}</td>
                    <td> {{$item->name}}</td>
                    <td> <div style="width: 100px;height: 20px; background: {{$item->color}};"></div></td>

                    <td width="10px">

                        <a href="{{route('admin.tags.edit', $item)}}" class="btn btn-warning">Edit</a>
                    </td>
                    <td width="10px">
                        <form action="{{route('admin.tags.destroy', $item)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>

                        </form>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>

    </div>
</div>
@stop





@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    console.log('Hi!');
</script>
@stop