<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Page title about') }}
        </h2>
      </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-10 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg ">
                <div>
                    <h1 class="font-bold text-3xl text-gray-500">{{ __('About title') }}</h1>
                </div>
                <div class="mt-5  text-lg text-justify text-gray-600">
                    <p class="mb-3">
                        {!! __('About row 1') !!}
                    </p>
                    <p class="mb-3">
                        {!! __('About row 2') !!}
                    </p>
                    <p class="mb-3">
                        {!! __('About row 3') !!}

                        <div class="ml-5">
                            {!! __('About list') !!}
                        </div>
                    </p>
                    <p>
                        {{ __('About row 4') }}

                        <div class="ml-5">
                            {!! __('About list 2') !!}
                        </div>
                    </p>

                    <p class="mb-3">
                        {!! __('About row 5')!!}
                    </p>

                    <p class="mb-3">
                        {!! __('About row 6') !!}
                    </p>

                    <p>
                        {!! __('About row 7') !!}
                    </p>
                    

                    <a href="https://github.com/VladimirKostikov/telegram-authorization/blob/main/README.md" target="_blank" class="text-white block w-full rounded center hover:bg-tg-200 p-4 text-center bg-tg-100 mt-10">{{ __('About button') }}</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
