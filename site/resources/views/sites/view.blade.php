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
                    <div>
                        2
                    </div>
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
