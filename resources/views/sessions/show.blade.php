<x-layout>
        <x-header>
                Home
        </x-header>
        <div class="container mx-auto p-4">
                <div class="flex flex-wrap -mx-4">
                        @foreach($games as $game)
                                <div class="w-1/4 px-4 mb-4 relative">
                                        <div class="bg-blue-950 border rounded-lg shadow-md p-4" style="height: 500px;">
                                                <a href="{{ route('game.show', $game['slug']) }}">
                                                        <img src="{{ $game['cover']['url']}}" alt="Cover" class="w-full mb-4 rounded-lg" />
                                                        <h3 class="text-xl text-white font-bold mb-2">{{ $game['name'] }}</h3>
                                                        @auth
                                                                @if(!in_array($game['id'],$savedGames))
                                                                <form id="saveGame-form" method="POST" action="/saveGame">
                                                                        @csrf
                                                                        <input type="hidden" name="game_id" value="{{ $game['id'] }}">
                                                                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">Save</button>
                                                                </form>
                                                                @else
                                                                <form id="removeGame-form" method="POST" action="/removeGame" class="absolute mr-4 bottom-4 right-4">
                                                                        @csrf
                                                                        <input type="hidden" name="game_id" value="{{ $game['id'] }}">
                                                                        <button type="submit" class="bg-red-500 hover:bg-red-800 text-white font-bold py-2 px-4 rounded-full">Remove</button>
                                                                </form>
                                                                @endif
                                                        @endauth
                                                </a>
                                        </div>
                                </div>
                        @endforeach
                </div>
        </div>
</x-layout>