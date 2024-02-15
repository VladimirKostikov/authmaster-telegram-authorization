<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Page title help') }}
        </h2>
      </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-10 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg ">
                <div>
                    <h1 class="font-bold text-3xl text-gray-500">{{ __('Help') }}</h1>
                </div>
                <div class="mt-5 text-lg text-justify text-gray-600">
                    <p class="mb-3">
                       {{ __('Help row 1')}}
                    </p>   
                    {!! __('Help row 2') !!}
                    <p class="mb-3">
                        {{ __('Help row 3') }}
                    </p>  
                </div>
                <a href="https://github.com/VladimirKostikov/telegram-authorization/blob/main/README.md" target="_blank" class="text-white block w-full rounded center hover:bg-tg-200 p-4 text-center bg-tg-100 mt-10">{{ __('Help button 1') }}</a>
                <a href="https://github.com/VladimirKostikov/telegram-authorization/blob/main/README.md" target="_blank" class="block hover:bg-green-300 bg-green-400 text-center p-3 text-white rounded mt-3">{{ __('Help button 2') }}</a>
            </div>
        </div>
    </div>
</x-app-layout>
