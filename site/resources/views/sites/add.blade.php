<x-app-layout>
    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-10">
              <div class="text-center mb-7">
                <h1 class="text-gray-500 text-xl font-bold">Добавление нового сайта</h1>
              </div>
              <form class="max-w-2xl mx-auto" method="POST" action="{{ route('sites_form_create') }}">
                @csrf
                <div class="mb-5">
                  <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Название сайта</label>
                  <input autocomplete="off" type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Site name" required>
                </div>
                <div class="mb-5">
                  <label for="url" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">URL</label>
                  <input autocomplete="off" type="text" name="url" id="url" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="https://example.com/" required>
                </div>
                <div class="mb-5">
                  <label for="url" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">URL для HTTPS уведомления</label>
                  <input autocomplete="off" type="text" name="http_notification" id="url" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="https://example.com/notification" required>
                </div>
                <div class="flex items-start mb-5">
                  <div class="flex items-center h-5">
                    <input id="remember" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800" required>
                  </div>
                  <label for="remember" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Я прочитал <a href="#" class="text-cyan-600">правила использования сервиса</a></label>
                </div>
                <button type="submit" class="text-white bg-cyan-600 hover:bg-cyan-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Добавить сайт</button>
                @if ($errors->any())
                <div class="p-5 text-white bg-red-500 mt-10">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
              </form>
            </div>
        </div>
    </div>
</x-app-layout>
