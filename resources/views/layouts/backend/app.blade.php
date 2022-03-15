<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}" type="image/x-icon">

        <title>@yield('title') | {{config('app.name', 'BlockPC')}}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;600;700&display=swap">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <style>
            [x-cloak] { 
                display: none !important;
            }
        </style>

        @livewireStyles
        @toastr_css
        @stack('styles')

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-roboto antialiased text-dark bg-dark">
        <div class="h-layout m-0 md:m-4 border border-dark rounded-none md:rounded-md flex">
            <div class="w-64 h-full nav-dark rounded-l-md">
                <div class="flex items-center h-12 w-64">
                    <div class="w-16">
                        <x-application-logo class="h-8 w-8 mx-auto" />
                    </div>
                    <div class="w-48">
                        <span class="text-lg font-bold">{{ config('app.name', 'BlockPC') }}</span>
                    </div>
                </div>
                <div class="w-64 overflow-y-auto scrollbar-thin scrollbar-thumb-gray-400">
                    <div class="px-6 pt-4">
                        <div class="flex flex-col space-y-2">
                            {{-- single link --}}
                            <div class="relative text-gray-400 hover:text-white focus-within:text-white">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-2 pointer-events-none">
                                    <x-bx-layout class="w-5 h-5 stroke-current" />
                                </div>
                                <a href="#" class="inline-block w-full py-2 pl-8 pr-4 text-xs rounded hover:bg-gray-600 focus:outline-none focus:ring-1 focus:ring-gray-500 focus:bg-gray-600">Dashoboard</a>
                            </div>
                            {{-- dropdown link --}}
                            <div class="">
                                <div class="relative flex justify-between text-gray-400 hover:text-white focus-within:text-white">
                                    <div class="flex items-center w-full">
                                        <div class="absolute inset-y-0 left-0 flex items-center pl-2 pointer-events-none">
                                            <x-bx-book-content class="w-5 h-5 stroke-current" />
                                        </div>
                                        <a href="#" class="inline-block w-full py-2 pl-8 pr-4 text-xs rounded hover:bg-gray-600 focus:outline-none focus:ring-1 focus:ring-gray-500 focus:bg-gray-600">Content</a>
                                    </div>
                                    <div class="absolute right-0 flex items-center p-1" tabindex="-1">
                                        <x-bx-chevron-down class="w-5 h-5 stroke-current" />
                                    </div>
                                </div>
                                <div class="pt-2 pl-4">
                                    <div class="flex flex-col pl-2 text-gray-400 border-l border-gray-700">
                                        <a href="#" class="inline-block w-full px-4 py-2 text-xs rounded hover:bg-gray-600 hover:text-white focus:outline-none focus:ring-1 focus:ring-gray-500 focus:text-white">Course</a>
                                        <a href="#" class="inline-block w-full px-4 py-2 text-xs rounded hover:bg-gray-600 hover:text-white focus:outline-none focus:ring-1 focus:ring-gray-500 focus:text-white">Categories</a>
                                        <a href="#" class="inline-block w-full px-4 py-2 text-xs rounded hover:bg-gray-600 hover:text-white focus:outline-none focus:ring-1 focus:ring-gray-500 focus:text-white">Instructors</a>
                                        <a href="#" class="inline-block w-full px-4 py-2 text-xs rounded hover:bg-gray-600 hover:text-white focus:outline-none focus:ring-1 focus:ring-gray-500 focus:text-white">Video Library</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="px-6 pt-4"><hr class="border-gray-700"></div>
                    <div class="px-6 pt-4">
                        <div class="relative text-gray-400 hover:text-white focus-within:text-white">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-2 pointer-events-none">
                                <x-heroicon-o-users class="w-5 h-5 stroke-current" />
                            </div>
                            <a href="#" class="inline-block w-full py-2 pl-8 pr-4 text-xs rounded hover:bg-gray-600 focus:outline-none focus:ring-1 focus:ring-gray-500 focus:bg-gray-600">Users</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex-1">
                <div class="h-12 nav-dark rounded-tr-md flex justify-between items-center px-4">
                    <div class="">inicio</div>
                    <div class="">fin</div>
                </div>
                <div class="overflow-y-auto scrollbar-thin scrollbar-thumb-gray-400">
                    @yield('content')
                </div>
            </div>
        </div>
        {{-- <div class="relative min-h-screen md:flex flex-col" x-data="{sidebar:false, mode: localStorage.theme == 'dark'}">
        </div> --}}
        @livewireScripts
        @jquery
        @toastr_js
        @toastr_render
        @stack('scripts')
    </body>
</html>