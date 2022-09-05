<div class="mb-3">
    {!! Form::label("name", "Nombre:", ['class'=> '']) !!}
    {{ form::text("name", null, ['class' => 'form-control' , 'placeholder' => 'Ingrese el nombre de la Categoria']) }}
    @error('name')
    <span class="text-danger">
        <strong>{{ $message }}</strong>
    </span>

    @enderror
</div>
<div class="mb-3">
    {!! Form::label("slug", "Slug:", ['class'=> '']) !!}
    {{ form::text("slug", null, ['class' => 'form-control' , 'placeholder' => 'Ingrese del Slug','readonly']) }}
    @error('slug')
    <span class="text-danger">
        <strong>{{ $message }}</strong>
    </span>

    @enderror
</div>
<div class="mb-3">
    {!! Form::label('color', 'Color:') !!}
    {!!form::input('color', 'color', null, ['class' => 'form-control form-control-color' , 'placeholder' => 'Ingrese el color de la Categoria'])!!}
    @error('color')
    <span class="text-danger">
        <strong>{{ $message }}</strong>
    </span>
    @enderror


</div>