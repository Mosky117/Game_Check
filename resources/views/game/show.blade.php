@props(['game'])
<x-layout>
    <x-header>
        Details
    </x-header>
    <div x-data="{ fullScreenImage: null }" class="text-white container mx-auto p-4">
        <div class="flex flex-wrap">
            <div class="w-1/4 pr-4">
                <img src="{{ isset($game['cover']['url'])? $game['cover']['url']:asset('imgs/game.jpg') }}" alt="Copertina" class="w-full rounded-lg mb-4" />
            </div>
            <div class="w-2/4 pl-4">
                <h1 class="text-4xl font-bold mb-4">{{ $game['name'] }}</h1>
                <p class="mb-4">{{ isset($game['summary'])? $game['summary']:'No description no spoilers... I guess' }}</p>
                @auth
                    <form id="saveGame-form" method="POST" action="/saveGame" class=" mr-4 bottom-4 right-4">
                        @csrf
                        <input type="hidden" name="game_id" value="{{ $game['id'] }}">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">Save</button>
                    </form>
                @endauth
            </div>
            <div class="w-1/4 pl-4">
                <div class="bg-blue-950 border rounded-lg shadow-md p-4 mb-4">
                    <h2 class="text-xl font-bold mb-2">Platforms</h2>
                    <p>{{ $game['platforms'] }}</p>
                </div>
            </div>
        </div>
        <div class="flex mt-8">
            <div class="w-full pl-4">
                <h2 class="text-xl font-bold mb-2">Screenshots</h2>
                @if(isset($game['screenshots']))
                    <div class="flex flex-wrap -mx-2">
                        @foreach($game['screenshots'] as $screenshot)
                            <div class="w-1/3 px-2 mb-4">
                                <img src="{{ $screenshot['big'] }}" alt="Screenshot" class="w-full rounded-lg" 
                                @click="fullScreenImage= '{{$screenshot['huge']}}'"/>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p>No screenshots for this game</p>
                @endif
            </div>
        </div>
        <template x-if="fullScreenImage">
            <div class="fixed top-0 left-0 w-full h-full flex items-center justify-center bg-black bg-opacity-75 z-50"
                @click="fullScreenImage = null">
                <img :src="fullScreenImage" class="max-h-full max-w-full" />
            </div>
        </template>
    </div>
</x-layout>