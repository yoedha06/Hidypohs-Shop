<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('assets/img/h.jpg') }}">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <title>{{ $title }} - Hidypohs</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    @stack('css')
    <style>
        .swiper-pagination-bullet-active {
            background: rgb(199, 5, 5);
        }
    </style>
</head>

<body>
    <nav class="bg-white dark:bg-gray-900 fixed w-full z-20 top-0 start-0 border-b border-gray-200 dark:border-gray-600">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a wire:navigate href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="{{ asset('assets/img/h12.png') }}" class="w-100 h-10">
            </a>
            <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                @if(!auth()->user())
                    <a wire:navigate href="/login"
                        class="text-white bg-gradient-to-r from-violet-700 to-red-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Get
                        started
                    </a>
                @elseif(auth()->user()->role == 'admin')
                    <a wire:navigate href="/admin"
                        class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Dashboard
                    </a>
                @elseif(auth()->user()->role == 'customer')
                    <a wire:navigate href="/user"
                        class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Dashboard
                    </a>
                @endif
                
            </div>
            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
                <ul x-data="{ activeHome: false, activeAbout: false, activeFaq: false }" x-init="activeHome = window.location.pathname == '/', activeAbout = window.location.pathname == '/about', activeFaq = window.location.pathname == '/faqs'"
                    class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    <li>
                        <a wire:navigate href="/"
                            class="block py-2 px-3 text-white bg-red-700 rounded md:bg-transparent "
                            :class="activeHome ? 'md:text-red-700 md:p-0 md:dark:text-red-500' :
                                'md:text-gray-700 md:p-0 md:dark:text-gray-500'">Home</a>
                    </li>
                    <li>
                        <a wire:navigate href="/about"
                            class="block py-2 px-3 text-white bg-red-700 rounded md:bg-transparent "
                            :class="activeAbout ? 'md:text-red-700 md:p-0 md:dark:text-red-500' :
                                'md:text-gray-700 md:p-0 md:dark:text-gray-500'">
                            About
                        </a>
                    </li>
                    <li>
                        <a wire:navigate href="/faqs"
                            class="block py-2 px-3 text-white  bg-red-700 rounded md:bg-transparent "
                            :class="activeFaq ? 'md:text-red-700 md:p-0 md:dark:text-red-500' :
                                'md:text-gray-700 md:p-0 md:dark:text-gray-500'">
                            FaQs
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    {{ $slot }}
    <script data-navigate-once src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
    @livewireScripts
</body>

</html>
