<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-10 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg ">
                <div class="mb-10">
                    <h1 class="text-gray-500 text-xl font-bold">Авторизации на сайте {{ $site->name }}</h1>
                </div>


                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    ID
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Сайт
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Статус
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Посмотреть
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
                                        <span class="bg-green-600 text-white p-3 rounded">Подтверждено</span>
                                    @else
                                        <span class="bg-red-600 text-white p-3 rounded">Не подтверждено</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    <a href="{{ route('codes_view', ['id'=>$code->id]) }}" target="_blank" class="bg-tg-200 hover:bg-tg-100 p-3 rounded text-white">Подробнее</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
