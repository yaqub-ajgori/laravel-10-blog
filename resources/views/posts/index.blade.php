<x-app-layout :meta-title="$category->title" meta-description="Yaqub Blog">
    <section class="w-full md:w-2/3 flex flex-col items-center px-3">

        @foreach ($posts as $post)
        <x-post-item :post="$post"></x-post-item>
        @endforeach


        <!-- Pagination -->
        {{ $posts->onEachSide(1)->links() }}

    </section>

        <!-- Sidebar Section -->
        <x-sidebar></x-sidebar>
</x-app-layout>
