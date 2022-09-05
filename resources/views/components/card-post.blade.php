@props(['item'])

<article class="mb-8 bg-white shadow-lg rounded-lg overflow-hidden">

    @if ($item->image)
        <img class="w-full h-72 object-cover object-center" src="{{Storage::url($item->image->url)}}" alt="">
    @else
        <img class="w-full h-72 object-cover object-center" src="https://cdn.pixabay.com/photo/2015/04/23/22/00/tree-736885__340.jpg" alt="">
    @endif

    <div class="px-6 py-4">
        <h1 class="font-bold text-xl mb-2">
            <a href="{{ route('posts.show', $item) }}" class="text-gray-900">{{$item->name}}</a>

        </h1>
        <p class="text-gray-700 text-base">{!!$item->extract!!}</p>
    </div>
    <div class="px-6 pt-4 pb-2">
        @foreach ($item->tags as $tag)
        <a href="{{route('posts.tag', $tag)}}" class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">
            {{$tag->name}}
        </a>
        @endforeach
    </div>
</article>
