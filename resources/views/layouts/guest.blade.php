<x-app-layout>
    <body class="font-sans text-gray-900 antialiased">
        <div class="w-full flex flex-col justify-center items-center pt-6 sm:pt-0 ">
            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
    </body>
</x-app-layout>

