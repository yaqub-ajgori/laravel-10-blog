<article class="flex flex-col shadow my-4">
    <!-- Article Image -->
    <a href="{{ route('posts.show', $post) }}" class="hover:opacity-75">
        <img src="{{ $post->getThumbnail() }}">
    </a>
    <div class="bg-white flex flex-col justify-start p-6">
        <a href="#" class="text-blue-700 text-sm font-bold uppercase pb-4">
            @foreach ($post->categories as $category)
            {{ $category->title }}/
            @endforeach
        </a>
        <a href="{{ route('posts.show', $post) }}" class="text-3xl font-bold hover:text-gray-700 pb-4">{{ $post->title }}</a>
        <p href="#" class="text-sm pb-3">
            By <a href="#" class="font-semibold hover:text-gray-800">{{ $post->user?->name }}</a>, Published on {{ $post->getFormattedDate() }} | {{ $post->getPostReadTime()['reading_time'] }} min read, {{ $post->getPostReadTime()['word_count'] }} words
        </p>
        <a href="#" class="pb-6">{!! $post->shortBody() !!}</a>
        <a href="{{ route('posts.show', $post) }}" class="font-bold uppercase text-gray-800 hover:text-black">Continue Reading <i class="fas fa-arrow-right"></i></a>
</article>
