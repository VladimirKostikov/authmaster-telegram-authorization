<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Page title auths view') }}
        </h2>
      </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-10 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg relative">
                <div class="absolute right-12 top-12">
                    @if($code->status)
                        <span class="bg-green-600 text-white p-3 rounded">{{ __('Authorizations list table status true') }}</span>
                    @else
                        <span class="bg-red-600 text-white p-3 rounded">{{ __('Authorizations list table status false') }}</span>
                    @endif
                </div>
                <div class="mb-10">
                    <h1 class="text-gray-500 text-xl font-bold">№ {{ $code->id }}</h1>
                </div>
                <div class="grid grid-cols-2">
                    <div class="text-lg">
                        <dl class="max-w-md text-gray-900 divide-y divide-gray-200 dark:text-white dark:divide-gray-700">
                            <div class="flex flex-col pb-3">
                                <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">ID</dt>
                                <dd class="text-lg font-semibold">{{ $code->id }}</dd>
                            </div>
                            <div class="flex flex-col py-3">
                                <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">URL</dt>
                                <dd class="text-lg font-semibold">{{ $site->url }}</dd>
                            </div>
                            <div class="flex flex-col pt-3">
                                <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">{{ __('Site view notification') }}</dt>
                                <dd class="text-lg font-semibold">{{ $site->http_notification }}</dd>
                            </div>
                            <div class="flex flex-col pt-3">
                                <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">{{ __('Site view redirect') }}</dt>
                                <dd class="text-lg font-semibold">{{ $site->http_ref }}</dd>
                            </div>
                            <div class="flex flex-col pt-3">
                                <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">{{ __('Authorization view date') }}</dt>
                                <dd class="text-lg font-semibold">{{ $site->created_at }}</dd>
                            </div>
                        </dl>
                    </div>

                    <div>
                        <div class="mb-5">
                            <h1 class="text-gray-500 text-xl font-bold">{{ __('Authorization view obj') }}</h1>
                        </div>
                        <code
                        class="text-sm w-full h-1/2 sm:text-base inline-flex text-left items-center space-x-4 bg-gray-800 text-white rounded-lg p-4 pl-6">
                        <span class="flex gap-4">

                            @if($code->status)
                            <span class="flex-1">
<pre>
{"menu": {  
    "id": "file",  
    "value": "File",  
    "popup": {  
        "menuitem": [  
            {"value": "New", "onclick": "CreateDoc()"},  
            {"value": "Open", "onclick": "OpenDoc()"},  
            {"value": "Save", "onclick": "SaveDoc()"}  
        ]  
    }  
}}  
</pre>
                            </span>
                            @else
                            <p class="text-center">{{ __('Authorization view obj none') }}</p>
                            @endif
                        </span>
                    </code>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
