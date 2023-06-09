<aside class="w-full md:w-1/3 flex flex-col items-center px-3">

    <div class="w-full bg-white shadow flex flex-col my-4 p-6">
        <h3 class="text-xl font-semibold mb-2">All Categories</h3>
        <ul>
            @foreach ($categories as $category)
            <li class="{{ request('category')?->slug == $category->slug ? 'bg-blue-600 text-white' : '' }}">
                <a href="{{ route('by-category', $category) }}">{{ $category->title }} ({{ $category->total }})</a>
            </li>
            @endforeach
        </ul>
    </div>

    <div class="w-full bg-white shadow flex flex-col my-4 p-6">
        <p class="text-xl font-semibold pb-5">
            {{ \App\Models\SidebarWidget::getTitle('about-us') }}
        </p>
        <p class="pb-2">{!! \App\Models\SidebarWidget::getContent('about-us') !!}</p>
        <a href="{{ \App\Models\SidebarWidget::getBtnLink('about-us') }}" class="w-full bg-blue-800 text-white font-bold text-sm uppercase rounded hover:bg-blue-700 flex items-center justify-center px-2 py-3 mt-4">
            {{ \App\Models\SidebarWidget::getBtnText('about-us') }}
        </a>
    </div>

</aside>
