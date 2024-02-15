<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Page title sites') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-10 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg ">
                @if($sites->isEmpty())
                <div class="text-center text-gray-900 dark:text-gray-100 ">
                    {!! __("Empty site list") !!}.
                </div>
                @else

                
                <h1 class="text-gray-500 text-xl font-bold">{{ __('Sites list title') }} </h1>

                <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
                    @foreach($sites as $site)
                    <div class="group relative">
                        <div class="bg-gradient-to-b from-tg-100 text-center text-lg to-tg-200 text-white aspect-h-1 p-10 aspect-w-1 w-full overflow-hidden rounded-md bg-gray-200 lg:aspect-none group-hover:opacity-75">
                            {{ $site->name}}
                        </div>
                        <div class="mt-4 flex justify-between">
                        <div>
                            <h3 class="text-sm text-gray-700">
                            <a href="{{ route('sites_view', ['id'=>$site->id]) }}">
                                <span aria-hidden="true" class="absolute inset-0"></span>
                                {{ __('Sites list authorizations') }}
                            </a>
                            </h3>
                            @if($site->status)
                                <p class="mt-1 text-sm text-green-500">{{ __('Sites list status true') }}</p>
                            @else
                                <p class="mt-1 text-sm text-red-500">{{ __('Sites list status false') }}</p>
                            @endif
                        </div>
                        <p class="text-sm font-medium text-gray-900">{{ $site->auths }}</p>
                        </div>
                    </div>
                    @endforeach
                    <div class="group relative">
                        <a href="{{ route('sites_add') }}" class="border-dashed border-2 border-gray-600 block bg-white text-center text-lg to-cyan-700 text-gray-700 aspect-h-1 p-10 aspect-w-1 w-full overflow-hidden rounded-md bg-gray-200 lg:aspect-none group-hover:opacity-75">
                            {{ __('Sites list add') }}
                        </a>
                    </div>
                </div>

                @endif
            </div>
        </div>
    </div>
</x-app-layout>
