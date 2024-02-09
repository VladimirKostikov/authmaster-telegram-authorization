<x-app-layout>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-10">
                <div class="mb-7">
                    <h1 class="text-gray-500 text-xl font-bold">Просмотр сайта</h1>
                </div>
                <div class="grid grid-cols-2 gap-10">
                    <div>
                        <dl class="max-w-md text-gray-900 divide-y divide-gray-200 dark:text-white dark:divide-gray-700">
                            <div class="flex flex-col pb-3">
                                <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Название сайта</dt>
                                <dd class="text-lg font-semibold text-gray-500">{{ $site->name }}</dd>
                            </div>
                            <div class="flex flex-col py-3">
                                <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">URL сайта</dt>
                                <dd class="text-lg font-semibold text-gray-500">{{ $site->url }}</dd>
                            </div>
                            <div class="flex flex-col pt-3">
                                <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">HTTPS уведомление</dt>
                                <dd class="text-lg font-semibold text-gray-500">{{ $site->http_notification }}</dd>
                            </div>
                            <div class="flex flex-col pt-3">
                                <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">API ключ</dt>
                                <dd class="text-lg font-semibold text-gray-500">{{ $site->http_notification }}</dd>
                            </div>
                            <div class="flex flex-col pt-3">
                                <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Статус</dt>
                                <dd class="text-lg font-semibold text-gray-500">
                                    @if($site->status)
                                        <p class="mt-1 text-sm text-green-500">Работает</p>
                                    @else
                                        <p class="mt-1 text-sm text-red-500">Не работает</p>
                                    @endif
                                </dd>
                            </div>
                        </dl>

                    </div>
                    @if(!$site->checked)
                    <div class="bg-cyan-500 p-10 rounded">
                        <div class="text-white">
                            <h2 class="font-bold text-2xl">Подтверждение прав</h2>
                            <p>Чтобы активировать систему авторизации через Telegram на вашем сайте, вам необходимо подтвердить права на него. Для этого вам нужно создать файл checker.txt, чтобы он был доступен по ссылке: <b>{{ $site->url }}checker.txt</b> и вставить туда код, написанный ниже </p>
                        </div>

                        <div class="rounded bg-white p-2 mt-5 mb-5 truncate pr-8 relative cursor-pointer">
                            <div class="absolute top-2 right-2">
                                <svg width="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#33333333"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g id="Edit / Copy"> <path id="Vector" d="M9 9V6.2002C9 5.08009 9 4.51962 9.21799 4.0918C9.40973 3.71547 9.71547 3.40973 10.0918 3.21799C10.5196 3 11.0801 3 12.2002 3H17.8002C18.9203 3 19.4801 3 19.9079 3.21799C20.2842 3.40973 20.5905 3.71547 20.7822 4.0918C21.0002 4.51962 21.0002 5.07967 21.0002 6.19978V11.7998C21.0002 12.9199 21.0002 13.48 20.7822 13.9078C20.5905 14.2841 20.2839 14.5905 19.9076 14.7822C19.4802 15 18.921 15 17.8031 15H15M9 9H6.2002C5.08009 9 4.51962 9 4.0918 9.21799C3.71547 9.40973 3.40973 9.71547 3.21799 10.0918C3 10.5196 3 11.0801 3 12.2002V17.8002C3 18.9203 3 19.4801 3.21799 19.9079C3.40973 20.2842 3.71547 20.5905 4.0918 20.7822C4.5192 21 5.07899 21 6.19691 21H11.8036C12.9215 21 13.4805 21 13.9079 20.7822C14.2842 20.5905 14.5905 20.2839 14.7822 19.9076C15 19.4802 15 18.921 15 17.8031V15M9 9H11.8002C12.9203 9 13.4801 9 13.9079 9.21799C14.2842 9.40973 14.5905 9.71547 14.7822 10.0918C15 10.5192 15 11.079 15 12.1969L15 15" stroke="#333" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g> </g></svg>
                            </div>
                            {{ $code }}
                        </div>

                        <div>
                            <a href="{{ route('sites_check',['id'=>$site->id]) }}" class="cursor-pointer block w-full text-white text-center bg-gray-800 p-3 hover:bg-gray-600 font-bold rounded">Подтвердить</a>
                        </div>
                    </div>
                    @endif
                </div>
                <div class="mt-20">
                    <canvas id="barChart"></canvas>
                </div>
            </div>
        </div>
    </div>

<script>
    var ctx = document.getElementById('barChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['January', 'February', 'March', 'April', 'May'],
            datasets: [{
                label: 'Авторизации',
                data: [65, 59, 80, 81, 56],
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
</x-app-layout>
