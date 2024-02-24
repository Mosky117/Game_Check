<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"  class="h-full bg-gray-100">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
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

                            <x-dropdown class="bg-white rounded-lg shadow-md">
                                <x-slot name="trigger">
                                    <button class="hover:bg-gray-900 px-3 py-2 rounded-full text-sm font-medium uppercase text-white">
                                        {{auth()->user()->username}}
                                    </button>
                                </x-slot>
                                
                                <x-dropdown-item href="/saveGame">
                                    My List
                                </x-dropdown-item>
                                <x-dropdown-item href="#" x-data="{}" @click.prevent="document.querySelector('#logout-form').submit()">
                                    Log Out
                                </x-dropdown-item>

                                <form id='logout-form' method="POST" class="hidden" action="/logout">
                                    @csrf

                                </form>
                            </x-dropdown>
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

        <!-- <header class="bg-white shadow">
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold tracking-tight text-gray-900">Dashboard</h1>
            </div>
        </header> -->
        <main class="bg-indigo-950">
            <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            <!-- Your content -->
                {{$slot}}
            </div>
        </main>
        </div>
    </body>
</html>