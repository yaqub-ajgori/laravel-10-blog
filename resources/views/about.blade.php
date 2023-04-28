<x-app-layout meta-title="Yaqub Blog" meta-description="About Us">

    <div class="py-2 px-4 bg-slate-100">
        <h2 class="text-4xl font-semibold mb-2 text-center">{{ $widget->title }}</h2>
        <img class="w-full" src="{{ $widget->image }}" alt="">
        <p>{!! $widget->description !!}</p>

    </div>

</x-app-layout>
