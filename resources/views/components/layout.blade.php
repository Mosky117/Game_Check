<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"  class="h-full bg-gray-100">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="{{asset('js/functions.js')}}"></script>
        <script src="https://cdn.tailwindcss.com?plugins=forms"></script>

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <style>
            
        </style>
    </head>
    <body class="h-full bg-indigo-950">
        <div class="min-h-full">
        <nav class="bg-blue-950">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex h-16 items-center justify-between">
                <div class="flex items-center">
                <div class="flex-shrink-0">
                    <img class="h-8 w-8 text-white" src="{{asset('imgs/logo.svg')}}" alt="Your Company">
                </div>
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        @if(request()->is('/'))
                            <a href="/" class="bg-gray-900 text-white rounded-full px-3 py-2 text-sm font-medium">Home</a>
                        @else
                            <a href="/" class="text-white rounded-full px-3 py-2 text-sm font-medium hover:bg-gray-900">Home</a>
                        @endif
                    </div>
                </div>
                </div>
                <div class="hidden md:block">
                <div class="ml-4 flex items-center md:ml-6">

                    <!-- Profile dropdown -->
                    <div class="relative ml-3">
                        @auth

                            <div class="relative w-24" id="dropdown-container">
                                <button id="user-button" class="hover:bg-gray-900 px-3 py-2 rounded-full text-sm font-medium uppercase text-white" onclick="toggleDropdown()">
                                    {{auth()->user()->username}}
                                </button>

                                <div id="dropdown-menu" class="py-2 absolute bg-gray-100 mt-2 rounded-xl w-full z-50 overflow-auto max-h-52" style="display: none;">
                                    <a class="block px-4 py-2 text-gray-800 leading-6 hover:bg-blue-500 focus:bg-blue-500 hover:text-white focus:text-white" href="/saveGame">My List</a>
                                    <a class="block px-4 py-2 text-gray-800 leading-6 hover:bg-blue-500 focus:bg-blue-500 hover:text-white focus:text-white" href="#" onclick="logout()">Log out</a>
                                    <form id="logout-form" method="POST" class="hidden" action="/logout">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        @else
                            <a href="/register" class="text-xs font-bold uppercase {{ request()->is('register') ? 'text-blue-500' : 'text-white' }}">Register</a>
                            <a href="/login" class="ml-6 text-xs font-bold uppercase {{ request()->is('login') ? 'text-blue-500' : 'text-white' }}">Log In</a>

                        @endauth


                    
                    </div>
                </div>
                </div>
            </div>
            </div>
        </nav>

        <main class="bg-indigo-950">
            <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
                {{$slot}}
            </div>
        </main>
        </div>
    </body>
</html>