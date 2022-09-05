<x-app-layout>
    <div class="container py-8">
        <h1 class="text-4xl font-bold text-gray-600">{{ $post->name }}</h1>
        <div class="">
            <p class="text-lg text-gray-500 mb-2">
                {!! $post->extract !!}
            </p>
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <div class="lg:col-span-2">
                    @if ($post->image)
                        <figure>
                            <img src="{{ Storage::url($post->image->url) }}"
                                class="w-full h-80 object-cover object-center" alt="">
                        </figure>
                    @else
                        <img class="w-full h-72 object-cover object-center"
                            src="https://cdn.pixabay.com/photo/2015/04/23/22/00/tree-736885__340.jpg" alt="">
                    @endif

                    <p class="text-gray-500 text-base mt-4 ">{!! $post->body !!}</p>
                </div>
                <aside>
                    <h1 class="text-2xl font-bold text-gray-600 mb-4">Mas en {{ $post->category->name }}</h1>
                    <ul>

                        @foreach ($aux as $item)
                            <li class="mb-4">
                                <a href="{{ route('posts.show', $item) }}" class="text-lg text-gray-500 mb-2 flex">
                                @if ($item->image)
                                    <img src="{{ Storage::url($item->image->url) }}"
                                        class="w-36 h-20 object-cover object-center" alt="">
                                @else
                                    <img class="w-36 h-20 object-cover object-center"
                                        src="https://cdn.pixabay.com/photo/2015/04/23/22/00/tree-736885__340.jpg" alt="">
                                @endif
                                    <span class="ml-2 text-gray-600">
                                        {{ $item->name }}
                                    </span>
                                </a>
                            </li>
                        @endforeach
                    </ul>

                </aside>
            </div>
        </div>
    </div>
</x-app-layout>
