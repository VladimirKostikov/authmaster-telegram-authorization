<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                @if($sites->isEmpty())
                <div class="p-10 text-gray-900 dark:text-gray-100 ">
                    {{ __("You're logged in!") }}
                </div>
                @else
                1
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
