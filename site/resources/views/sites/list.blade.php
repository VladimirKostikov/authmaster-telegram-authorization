<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg ">
                @if($sites->isEmpty())
                <div class="p-10 text-center text-gray-900 dark:text-gray-100 ">
                    {{ __("На данный момент вы не добавили сайт") }}.
                    <a href="{{ route('sites_add') }}" class="text-cyan-600">Добавьте прямо сейчас</a>
                </div>
                @else
                1
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
