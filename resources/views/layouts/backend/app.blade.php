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
    <body class="font-roboto antialiased text-dark bg-dark overflow-hidden" x-data="{mode: localStorage.theme == 'dark'}">
        <div class="m-0 lg:m-4 border border-gray-300 dark:border-gray-800 rounded-md flex overflow-hidden">
            <div class="h-full lg:h-menu nav-dark w-16 lg:w-64">
                <div class="logo-details flex items-center space-x-2 h-12">
                    <span class="w-16">
                        <x-application-logo class="h-8 w-8 mx-auto" />
                    </span>
                    <span class="logo-name text-2xl font-bold w-48 hidden lg:block">Blockpc</span>
                </div>
                <div class="nav-links h-sidebar-sm lg:h-sidebar flex flex-col justify-between">
                    <div class="flex flex-col justify-between h-sidebar-sm lg:h-sidebar">
                        <div class="flex-1 flex-col space-y-2 my-2 z-10">
                            {{--overflow-y-auto scrollbar-thin scrollbar-thumb-gray-400--}}
                            <x-links.sidebar name="Dashboard" route="{{ route('dashboard') }}">
                                <x-slot name="icon">
                                    <x-bx-link class="h-5 w-5 mx-auto" />
                                </x-slot>
                            </x-links.sidebar>
                            <x-links.dropdown-sidebar name="Categories">
                                <x-slot name="icon">
                                    <x-bx-collection class="h-5 w-5 mx-auto" />
                                </x-slot>
                                <x-slot name="content">
                                    <x-links.dropdown-link href="#">
                                        <span>Web Design</span>
                                    </x-links.dropdown-link>
                                    <x-links.dropdown-link href="#">
                                        <span>Cards Design</span>
                                    </x-links.dropdown-link>
                                    <x-links.dropdown-link href="#">
                                        <span>SEO Datas</span>
                                    </x-links.dropdown-link>
                                </x-slot>
                            </x-links.dropdown-sidebar>
                            <x-links.hr />
                            <x-links.sidebar name="Posts" route="#">
                                <x-slot name="icon">
                                    <x-bx-book-alt class="h-5 w-5 mx-auto" />
                                </x-slot>
                            </x-links.sidebar>
                            <x-links.sidebar name="Analitics" route="#">
                                <x-slot name="icon">
                                    <x-bx-pie-chart-alt-2 class="h-5 w-5 mx-auto" />
                                </x-slot>
                            </x-links.sidebar>
                            <x-links.sidebar name="Charts" route="#">
                                <x-slot name="icon">
                                    <x-bx-line-chart class="h-5 w-5 mx-auto" />
                                </x-slot>
                            </x-links.sidebar>
                            <x-links.dropdown-sidebar name="Plugins">
                                <x-slot name="icon">
                                    <x-bx-plug class="h-5 w-5 mx-auto" />
                                </x-slot>
                                <x-slot name="content">
                                    <x-links.dropdown-link href="#">
                                        <span>UI Face</span>
                                    </x-links.dropdown-link>
                                    <x-links.dropdown-link href="#">
                                        <span>Select2 Wire</span>
                                    </x-links.dropdown-link>
                                    <x-links.dropdown-link href="#">
                                        <span>Icons UI</span>
                                    </x-links.dropdown-link>
                                </x-slot>
                            </x-links.dropdown-sidebar>
                            <x-links.sidebar name="Explorer" route="#">
                                <x-slot name="icon">
                                    <x-bx-compass class="h-5 w-5 mx-auto" />
                                </x-slot>
                            </x-links.sidebar>
                            <x-links.sidebar name="History" route="#">
                                <x-slot name="icon">
                                    <x-bx-history class="h-5 w-5 mx-auto" />
                                </x-slot>
                            </x-links.sidebar>
                            <x-links.sidebar name="Settings" route="#">
                                <x-slot name="icon">
                                    <x-bx-cog class="h-5 w-5 mx-auto" />
                                </x-slot>
                            </x-links.sidebar>
                        </div>
                        <form class="relative hover:bg-red-100 hover:text-red-800 transition-all duration-200 my-2" method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a class="flex items-center py-2" href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                                <span class="w-16">
                                    <x-bx-log-out class="h-5 w-5 mx-auto text-red-500" />
                                </span>
                                <span class="link-name w-48 hidden lg:block">Logout</span>
                            </a>
                        </form>
                    </div>
                </div>
            </div>
            <div class="relative flex flex-col w-full">
                <div class="h-12 flex justify-between items-center nav-dark px-2 py-1">
                    <div class="flex items-center"></div>
                    <div class="flex items-center space-x-2">
                        <button type="button" x-on:click="mode=false" x-show="mode" class="setMode" id="sun">
                            <x-bx-sun class="h-5 w-5 text-yellow-300" />
                        </button>
                        <button type="button" x-on:click="mode=true" x-show="!mode" class="setMode" id="dark">
                            <x-bx-moon class="h-6 w-6 text-gray-800" />
                        </button>
                        <x-dropdown align="right" width="64">
                            <x-slot name="trigger">
                                <button class="flex items-center space-x-2 text-sm font-medium text-dark transition duration-150 ease-in-out mx-2">
                                    <img class="rounded-full w-8 h-8 text-gray-600" src="{{ image_profile() }}" alt="{{ current_user()->profile->fullname }}">
                                </button>
                            </x-slot>
                            <x-slot name="content">
                                <div class="flex items-center space-x-2 border-b-2 border-gray-200 dark:border-gray-600 p-2">
                                    <div class="w-12">
                                        <img class="w-12 h-12 mx-auto rounded-full text-gray-600" src="{{ image_profile() }}" alt="{{ current_user()->profile->fullname }}">
                                    </div>
                                    <div>
                                        <div class="font-bold text-base text-gray-800 dark:text-gray-200">{{ current_user()->profile->fullname }}</div>
                                        <div class="font-medium text-sm text-gray-500 dark:text-gray-400">{{ current_user()->cargo }}</div>
                                    </div>
                                </div>
                                <x-sidebar-link :href="route('profile')" :active="request()->routeIs('profile')">
                                    <div class="flex justify-between items-center">
                                        <span>{{ __('Profile User') }}</span>
                                        <x-bx-user-pin class="w-5 h-5" />
                                    </div>
                                </x-sidebar-link>
                                <hr class="border border-gray-200 dark:border-gray-600">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <x-logout-link :href="route('logout')"
                                            onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-logout-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>
                </div>
                <div class="h-sidebar-sm lg:h-sidebar p-2 lg:p-4 overflow-y-auto scrollbar-thin scrollbar-thumb-gray-400">
                    @yield('content')
                </div>
            </div>
        </div>
        
        @livewireScripts
        @jquery
        @toastr_js
        @toastr_render
        @stack('scripts')
    </body>
</html>