<x-app-layout :meta-title="$post->meta_title ?: $post->title">
    <!-- Post Section -->
    <section class="w-full md:w-2/3 flex flex-col items-center px-3">
        <article class="flex flex-col shadow my-4">
            <!-- Article Image -->
            <a href="#" class="hover:opacity-75">
                <img src="{{ $post->getThumbnail() }}">
            </a>
            <div class="bg-white flex flex-col justify-start p-6">
                <a href="#" class="text-blue-700 text-sm font-bold uppercase pb-4">
                    @foreach ($post->categories as $category)
                    {{ $category->title }}
                    @endforeach
                </a>
                <h2 class="text-3xl font-bold hover:text-gray-700 pb-4">
                    {{ $post->title }}
                </h2>
                <p href="#" class="text-sm pb-3">
                    By <a href="#" class="font-semibold hover:text-gray-800">{{ $post->user->name }}</a>, Published on {{ $post->getFormattedDate() }}
                </p>
                <h1 class="text-2xl font-bold pb-3">Introduction</h1>
                <p class="pb-3">
                    {!! $post->content !!}
                </p>
            </div>
        </article>

        <div class="w-full flex pt-6">
            <div class="w-1/2">
                @if ($previous)
            <a href="{{ route('posts.show', $previous) }}" class="block bg-white shadow hover:shadow-md text-left p-6">
                <p class="text-lg text-blue-800 font-bold flex items-center"><i class="fas fa-arrow-left pr-1"></i>
                Previous
                </p>
                <p class="pt-2">{{\Illuminate\Support\Str::words($previous->title, 5, '...')}}</p>
            </a>
            @endif
            </div>
           <div class="w-1/2">
            @if ($next)
            <a href="{{ route('posts.show', $next) }}" class="block bg-white shadow hover:shadow-md text-right p-6">
                <p class="text-lg text-blue-800 font-bold flex items-center justify-end">Next <i
                        class="fas fa-arrow-right pl-1"></i></p>
                <p class="pt-2">{{\Illuminate\Support\Str::words($next->title, 5, '...')}}</p>
            </a>
            @endif
           </div>
        </div>
    </section>
</x-app-layout>
