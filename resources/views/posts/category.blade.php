<x-app-layout>
    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8 py-8">

        <h1 class="uppercase text-center text-3xl">Categoria: {{$category->name}}</h1>
        @foreach ($posts as $item)
<x-card-post :item="$item" />
{{-- la variable que estra con los 2 puntos tiene que ser igual a la bariable que estas solicitando  --}}
        @endforeach
        <div class="mt-4">
            {{$posts->links()}}
        </div>
    </div>
</x-app-layout>