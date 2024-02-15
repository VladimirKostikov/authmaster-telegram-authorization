<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Page title auths') }}
        </h2>
      </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-10 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                @if($sites->isEmpty())
                <div class="text-center text-gray-900 dark:text-gray-100 ">
                    {!! __("Empty site list") !!}.
                </div>
                @else

            

                @if($sites->count() != 1)
                <div>
                    <h1 class="text-gray-500 text-xl font-bold">{{ __('Sites list title') }} </h1>
                </div>

                <div class="mt-6 mb-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
                    @foreach($sites as $site)
                    <div class="group relative">
                        <div class="bg-gradient-to-b from-tg-100 text-center text-lg to-tg-200 text-white aspect-h-1 p-10 aspect-w-1 w-full overflow-hidden rounded-md bg-gray-200 lg:aspect-none group-hover:opacity-75">
                            {{ $site->name }}
                        </div>
                        <div class="mt-4 flex justify-between">
                        <div>
                            <h3 class="text-sm text-gray-700">
                            <a href="{{ route('codes_site', ['id'=>$site->id]) }}">
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
                </div>
                @endif

                <div class="mb-10">
                    <h1 class="text-gray-500 text-xl font-bold">{{ __('Authorizations list title') }}</h1>
                </div>


                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    ID
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    {{ __('Authorizations list table site') }}
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    {{ __('Authorizations list table status') }}
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    {{ __('Authorizations list table look') }}
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($codes as $code)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $code->id }}
                                </th>
                                <td class="px-6 py-4">
                                    <a href="#" href="http://127.0.0.1/" target="_blank" class="hover:text-cyan-700">http://127.0.0.1/</a>
                                </td>
                                <td class="px-6 py-4">
                                    @if($code->status)
                                        <span class="bg-green-600 text-white p-3 rounded">{{ __('Authorizations list table status true') }}</span>
                                    @else
                                        <span class="bg-red-600 text-white p-3 rounded">{{ __('Authorizations list table status false') }}</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    <a href="{{ route('codes_view', ['id'=>$code->id]) }}" class="bg-tg-100 hover:bg-tg-200 uppercase p-3 rounded text-white">{{ __('Authorizations list table info') }}</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
