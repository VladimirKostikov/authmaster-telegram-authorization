<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>{{ config('app.name', 'Laravel') }}</title>
    
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link rel="shortcut icon" href="{{ asset('assets/icons/favicon.ico') }}" type="image/x-icon">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="{{ asset('assets/js/slidercraft/css/slidercraft.css') }}">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    </head>
<body>
    <header class='py-4 px-4 sm:px-10 fixed top-0 w-full font-[sans-serif] min-h-[70px] z-10'>
        <div class='flex flex-wrap items-center justify-between gap-5 relative'>
          <a href="javascript:void(0)" class="text-white font-bold relative"><span class="text-[24px]">AuthMaster</span><span class="text-[12px] absolute top-7 text-center w-full left-0">Sign in with Telegram</span></a>
          <div class='flex lg:order-1 max-sm:ml-auto'>
            <a href="{{ route('login') }}"
              class='px-4 py-2 text-sm rounded-full font-bold text-white transition-all ease-in-out duration-300 hover:bg-transparent hover:text-[#007bff]'>Login</a>
            <a href="{{ route('register') }}"
              class='px-4 py-2 text-sm rounded-full font-bold text-white transition-all ease-in-out duration-300 hover:bg-transparent hover:text-[#007bff] ml-3'>Sign
              up</a>
            <button id="toggle" class='lg:hidden ml-7'>
              <svg class="w-7 h-7" fill="#000" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                  d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                  clip-rule="evenodd"></path>
              </svg>
            </button>
          </div>
          <ul id="collapseMenu" class='lg:!flex lg:space-x-5 max-lg:space-y-2 max-lg:hidden max-lg:py-4 max-lg:w-full'>
            <li class='max-lg:border-b max-lg:bg-[#007bff] max-lg:py-2 px-3 max-lg:rounded'>
              <a href='javascript:void(0)'
                class='lg:hover:text-[#007bff] text-white max-lg:text-white block font-semibold text-[18px]'>Main</a>
            </li>
            <li class='max-lg:border-b max-lg:py-2 px-3 max-lg:rounded'><a href='javascript:void(0)'
                class='lg:hover:text-[#007bff] text-white block font-semibold text-[18px]'>About</a>
            </li>
            <li class='max-lg:border-b max-lg:py-2 px-3 max-lg:rounded'><a href='javascript:void(0)'
                class='lg:hover:text-[#007bff] text-white font-semibold text-[18px]'>Advantages</a>
            </li>
            <li class='max-lg:border-b max-lg:py-2 px-3 max-lg:rounded'><a href='javascript:void(0)'
                class='lg:hover:text-[#007bff] text-white font-semibold text-[18px]'>Media</a>
            </li>
            <li class='max-lg:border-b max-lg:py-2 px-3 max-lg:rounded'><a href='javascript:void(0)'
                class='lg:hover:text-[#007bff] text-white block font-semibold text-[18px]'>Socials</a>
            </li>
          </ul>
        </div>
    </header>
    <section class="flex h-dvh p-10 w-full bg-gradient-to-b from-tg-100 to-tg-200">
        <div class="lg:w-3/5 sm:w-1/2 m-auto">
            <div class="grid xl:grid-cols-2 gap-20 sm:grid-cols-1 sm:gap-10">
                <div class="text-white">
                    <h1 class="lg:text-[48px] sm:text-[24px] leading-10 font-bold">AuthMaster <br> Sign in With Telegram</h1>
                    <p class="text-[20px] mt-10">
                        AuthMaster offers a ready and simple solution in the form of algorithms for transferring Telegram user data directly to your web application for further authorization
                    </p>
                    <p class="text-[20px] mt-10">
                        To connect authorization via Telegram, you need to do a few things: confirm the rights to the web application and implement a method to process the user's Telegram data. That's it
                    </p>

                    <a href="#" class="w-full text-[18px] font-bold p-10 bg-green-400 hover:bg-green-500 text-white w-full text-center p-3 rounded mt-10 block">Connect your web application</a>
                    <p class="mt-5 mb-5">Made by <a href="#" class="underline font-bold underline-offset-8 hover:text-gray-100">Vladimir Kostikov</a></p>
                    <div class="flex mt-10 gap-5">
                        <a href="https://t.me/authmaster" target="_blank"><svg width="24px" height="24px" class="fill-white hover:fill-gray-100" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" xmlns:serif="http://www.serif.com/" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:1.41421;"><path id="telegram-4" d="M12,0c-6.626,0 -12,5.372 -12,12c0,6.627 5.374,12 12,12c6.627,0 12,-5.373 12,-12c0,-6.628 -5.373,-12 -12,-12Zm3.224,17.871c0.188,0.133 0.43,0.166 0.646,0.085c0.215,-0.082 0.374,-0.267 0.422,-0.491c0.507,-2.382 1.737,-8.412 2.198,-10.578c0.035,-0.164 -0.023,-0.334 -0.151,-0.443c-0.129,-0.109 -0.307,-0.14 -0.465,-0.082c-2.446,0.906 -9.979,3.732 -13.058,4.871c-0.195,0.073 -0.322,0.26 -0.316,0.467c0.007,0.206 0.146,0.385 0.346,0.445c1.381,0.413 3.193,0.988 3.193,0.988c0,0 0.847,2.558 1.288,3.858c0.056,0.164 0.184,0.292 0.352,0.336c0.169,0.044 0.348,-0.002 0.474,-0.121c0.709,-0.669 1.805,-1.704 1.805,-1.704c0,0 2.084,1.527 3.266,2.369Zm-6.423,-5.062l0.98,3.231l0.218,-2.046c0,0 3.783,-3.413 5.941,-5.358c0.063,-0.057 0.071,-0.153 0.019,-0.22c-0.052,-0.067 -0.148,-0.083 -0.219,-0.037c-2.5,1.596 -6.939,4.43 -6.939,4.43Z"/></svg></a>
                        <a href="https://github.com/VladimirKostikov/telegram-authorization/" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="24" class="fill-white hover:fill-gray-100" height="24" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg></a>
                        <a class="github-button" href="https://github.com/VladimirKostikov/authmaster-telegram-authorization/subscription" data-color-scheme="no-preference: light; light: light; dark: dark;" data-size="large" data-show-count="true" aria-label="Watch VladimirKostikov/authmaster-telegram-authorization on GitHub">Watch</a>
                        <a class="github-button" href="https://github.com/VladimirKostikov/authmaster-telegram-authorization" data-color-scheme="no-preference: light; light: light; dark: dark;" data-size="large" data-show-count="true" aria-label="Star VladimirKostikov/authmaster-telegram-authorization on GitHub">Star</a>
                        <a class="github-button" href="https://github.com/VladimirKostikov/authmaster-telegram-authorization/issues" data-color-scheme="no-preference: light; light: light; dark: dark;" data-size="large" data-show-count="true" aria-label="Issue VladimirKostikov/authmaster-telegram-authorization on GitHub">Issue</a>
                    </div>
                </div>
                <div>
                    <h1>Look how it works</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="mt-[50px]">
        <div class="w-3/5 m-auto">
            <h1 class="text-[36px] leading-10 font-bold">About this project</h1>

            <p class="mt-10 mb-10 text-[24px]">
                This project is an intermediary between your web application and Telegram. If you need authorization on your webapp via Telegram, you can use this project absolutely free of charge.
            </p>

            <p class="mt-10 mb-10 text-[24px]">
                From your web application redirects the user to the authorization page, where the user gets a code and a link to the bot
            </p>

            <p class="mt-10 mb-10 text-[24px]">
                The user then sends an authorization token to the bot and validation takes place. If the code is correct, your webapp receives the user's JSON data from Telegram via the specified HTTPS NOTIFICATION. If the code is not valid, user will get an error
            </p>

            <p class="mt-10 mb-10 text-[24px]">
                The last step is yours. It is necessary to process the received data to suit the needs of your project
            </p>
            <img src="{{ asset('assets/img/scheme.png')}}" alt="">
        </div>
    </section>

    <hr class="mt-[50px] mb-[50px]">

    <section class="mt-[50px]">
        <div class="w-3/5 m-auto text-[24px]">
            <h1 class="text-[36px] mb-5 leading-10 font-bold">Advantages</h1>
            <p class="mb-3">
                {!! __('About row 2') !!}
            </p>
            <p class="mb-3 list-disc">
                {!! __('About row 3') !!}

                <div class="ml-5 text-[20px]">
                    {!! __('About list') !!}
                </div>
            </p>

            <p class="mb-3">
                {!! __('About row 4') !!}
            </p>

            <p class="mb-3 list-disc">
                <div class="ml-5 text-[20px]">
                    {!! __('About list 2') !!}
                </div>
            </p>
        </div>
    </section>

    <hr class="mt-[50px] mb-[50px]">

    <section class="mt-[50px]">
        <div class="w-3/5 m-auto text-[24px]">
            <h1 class="text-[36px] mb-5 leading-10 font-bold">Media</h1>

            <div class="slider" id="slider" style="position: relative">
                <div>
                    <img src="{{ asset('assets/img/screen1.png')}}" alt="">
                </div>
                <div>
                    <img src="{{ asset('assets/img/screen2.png')}}" alt="">
                </div>
                <div>
                    <img src="{{ asset('assets/img/screen3.png')}}" alt="">
                </div>
            </div>
            <script type="module">
                import slider from "{{ asset('assets/js/slidercraft/main.js') }}";
                var sl = new slider('#slider', {
                    width: "100%"
                });
            </script>
        </div>
    </section>

    <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>
</html>