<x-app-layout>

    <div class="container py-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($posts as $item)
                <article class="w-full h-80 bg-cover bg-center @if ($loop->first) md:col-span-2 @endif"
                    style=" background-image: url(@if ($item->image)
                    {{Storage::url($item->image->url)}}
                                    @else
                                        https://cdn.pixabay.com/photo/2015/04/23/22/00/tree-736885__340.jpg

                                    @endif)">
                    {{--para que ise imagenes como fondo pero imagenses que estan unidos por los post --}}
                    <div class="w-full h-full px-8 flex flex-col justify-center">
                        <div class="">
                            @foreach ($item->tags as $items)
                                {{-- para la iteracion de los tags se usa el item de arriba para asi solo iterar de los que tiene ese item :v}} --}}
                                <a href="{{ route('posts.tag', $items) }}" style="background-color:{{ $items->color }}"
                                    class="inline-block px-3 h-6 text-white rounded-full">{{ $items->name }}</a>
                            @endforeach
                        </div>
                        <h1 class="text-4xl text-white leading-8 font-bold mt-2">
                            <a href="{{ route('posts.show', $item) }}">
                                {{ $item->name }}
                            </a>
                        </h1>
                    </div>
                </article>
            @endforeach
        </div>
        <div class="mt-4">
            {{ $posts->links() }}
        </div>
    </div>
</x-app-layout>
