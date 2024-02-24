<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Page title sites view') }}
        </h2>
    </x-slot>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-10">
                <div class="mb-7">
                    <h1 class="text-gray-500 text-xl font-bold">{{ $site->name }}</h1>
                </div>
                <div class="grid gap-x-6 gap-y-10 sm:grid-cols-1 lg:grid-cols-2 xl:gap-x-8">
                    <div>
                        <form action="{{ route('sites_form_update') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $site->id }}">
                            <dl class="max-w-md text-gray-900 divide-y divide-gray-200 dark:text-white dark:divide-gray-700">
                                <div class="flex flex-col pb-3">
                                    <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">{{ __('Site view name') }}</dt>
                                    <dd class="text-lg font-semibold text-gray-500">{{ $site->name }}</dd>
                                </div>
                                <div class="flex flex-col py-3">
                                    <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">{{ __('Site view url') }}</dt>
                                    <dd class="text-lg font-semibold text-gray-500">{{ $site->url }}</dd>
                                </div>
                                <div class="flex flex-col pt-3">
                                    <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">{{ __('Site view notification') }}</dt>
                                    <dd class="text-lg font-semibold text-gray-500">
                                        <input type="text" name="http_notification" required value="{{ $site->http_notification }}" class="border-slate-200 rounded w-full">
                                    </dd>
                                </div>
                                <div class="flex flex-col pt-3">
                                    <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">{{ __('Site view redirect') }}</dt>
                                    <dd class="text-lg font-semibold text-gray-500">
                                        <input type="text" name="http_ref" required value="{{ $site->http_ref }}" class="border-slate-200 rounded w-full">
                                    </dd>
                                </div>
                                <div class="flex flex-col pt-3">
                                    <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">{{ __('Site view status') }}</dt>
                                    <dd class="text-lg font-semibold text-gray-500">
                                        @if($site->status)
                                            <p class="mt-1 text-sm text-green-500">{{ __('Site view status true') }}</p>
                                        @else
                                            <p class="mt-1 text-sm text-red-500">{{ __('Site view status false') }}</p>
                                        @endif
                                    </dd>
                                </div>

                                @if ($errors->any())
                                <div class="p-3 text-white bg-red-500 text-center rounded mt-2">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif

                                @if($site->checked)
                                    @if($site->status)
                                        <a href="{{ route('sites_toggle', ['id'=>$site->id]) }}" class="block bg-red-500 text-white w-full text-center p-3 rounded mt-3">{{ __('Site view disable auth') }}</a>
                                    @else
                                        <a href="{{ route('sites_toggle', ['id'=>$site->id]) }}" class="block bg-green-500 hover:bg-green-400 text-white w-full text-center p-3 rounded mt-3">{{ __('Site view enable auth') }}</a>
                                    @endif
                                @endif

                                <input type="submit" value="{{ __('Site view update button') }}" class="block bg-tg-100 cursor-pointer hover:bg-tg-200 text-white w-full text-center p-3 rounded mt-3">
                            
                            </dl>
                        </form>
                        
                    </div>
                    @if(!$site->checked)
                    <div class="bg-tg-100 p-10 rounded">
                        <div class="text-white">
                            <h2 class="font-bold text-2xl">{{ __('Site view confirm rights title') }}</h2>
                            <p>{{ __('Site view confirm rights description') }}. URL: <b>{{ $site->url }}checker.txt</b> </p>
                        </div>

                        <div class="rounded bg-white hover:text-gray-400 p-2 mt-5 mb-5 truncate pr-8 relative cursor-pointer" onclick="copy('{{ $code }}', '{{ __('Site view confirm rights copy') }}')">
                            <div class="absolute top-2 right-2">
                                <svg width="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#33333333"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g id="Edit / Copy"> <path id="Vector" d="M9 9V6.2002C9 5.08009 9 4.51962 9.21799 4.0918C9.40973 3.71547 9.71547 3.40973 10.0918 3.21799C10.5196 3 11.0801 3 12.2002 3H17.8002C18.9203 3 19.4801 3 19.9079 3.21799C20.2842 3.40973 20.5905 3.71547 20.7822 4.0918C21.0002 4.51962 21.0002 5.07967 21.0002 6.19978V11.7998C21.0002 12.9199 21.0002 13.48 20.7822 13.9078C20.5905 14.2841 20.2839 14.5905 19.9076 14.7822C19.4802 15 18.921 15 17.8031 15H15M9 9H6.2002C5.08009 9 4.51962 9 4.0918 9.21799C3.71547 9.40973 3.40973 9.71547 3.21799 10.0918C3 10.5196 3 11.0801 3 12.2002V17.8002C3 18.9203 3 19.4801 3.21799 19.9079C3.40973 20.2842 3.71547 20.5905 4.0918 20.7822C4.5192 21 5.07899 21 6.19691 21H11.8036C12.9215 21 13.4805 21 13.9079 20.7822C14.2842 20.5905 14.5905 20.2839 14.7822 19.9076C15 19.4802 15 18.921 15 17.8031V15M9 9H11.8002C12.9203 9 13.4801 9 13.9079 9.21799C14.2842 9.40973 14.5905 9.71547 14.7822 10.0918C15 10.5192 15 11.079 15 12.1969L15 15" stroke="#333" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g> </g></svg>
                            </div>
                            {{ $code }}
                        </div>

                        <div>
                            <a href="{{ route('sites_check',['id'=>$site->id]) }}" class="cursor-pointer block w-full text-white text-center bg-gray-800 p-3 hover:bg-gray-600 font-bold rounded">{{ __('Site view confirm rights button') }}</a>
                        </div>
                    </div>

                    @else
                    <div class="bg-gray-100 p-5 rounded">
                        <div class="bg-white w-full h-full p-10 rounded">
                            <div class="mb-5">
                                <h3 class="text-gray-500 text-xl font-bold">{{ __('Site view auth add title') }}</h3>
                            </div>
                            <div class="mb-5">
                                <p class="mb-1 text-gray-500 md:text-lg dark:text-gray-400 text-lg">
                                    {!! __('Site view auth add description') !!}
                                </p>
                            </div>
                            <div class="mb-2">
                                <a href="#" onclick="copy(`{{ $auth_button }}`, '{{ __('Site view confirm rights copy') }}')" class="block hover:bg-cyan-400 bg-tg-100 text-center p-3 text-white rounded">{{ __('Site view auth button copy') }}</a>
                            </div>

                            <div class="mb-2">
                                <a href="#" onclick="copy(`{{ $auth_button }}`, '{{ __('Site view confirm rights copy') }}')" class="block hover:bg-green-300 bg-green-400 text-center p-3 text-white rounded">{{ __('Site view auth button doc') }}</a>
                            </div>

                            <div class="mb-2">
                                {!! $auth_button !!}                            
                            </div>
                            
                        </div>
                    </div>
                    @endif
                    
                </div>
                <div class="mt-10 mb-5">
                    <h3 class="text-gray-500 text-xl font-bold">{{ __('Site view stat title') }}</h3>
                </div>
                <div class="grid grid-cols-3 mt-20 text-gray-500 ">
                    <div class="text-center">
                        <div class="text-sm">
                            <span>{{ __('Site view stat day') }}</span>
                        </div>
                        <div class="text-2xl">
                            <span>{{ $auths_per_day }}</span>
                        </div>
                    </div>
                    <div class="text-center">
                        <div class="text-sm">
                            <span>{{ __('Site view stat month') }}</span>
                        </div>
                        <div class="text-2xl">
                            <span>{{ $auths_per_month }}</span>
                        </div>
                    </div>
                    <div class="text-center">
                        <div class="text-sm">
                            <span>{{ __('Site view stat year') }}</span>
                        </div>
                        <div class="text-2xl">
                            <span>{{ $auths_per_year }}</span>
                        </div>
                    </div>
                </div>    
                
                <div class="mt-10">
                    <a href="{{ route('codes_site',['id'=>$site->id]) }}" class="block text-center bg-tg-100 text-white width-full px-5 py-3 rounded hover:bg-tg-200">{{ __('Site auths list') }}</a>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
