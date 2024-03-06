@props(['games'])
@props(['currentPage'])
<x-layout>
    <x-header>
        Dashboard
    </x-header>
    <div class="container mx-auto p-4 flex">
        <div class="w-3/4 p-4">
            <x-filter></x-filter>
            <div class="flex flex-wrap -mx-4">
                @foreach($games as $game)
                <div class="w-1/3 px-4 mb-4 relative">
                    <div class="bg-blue-950 border rounded-lg shadow-md p-4" style="height: 550px;">
                        <a href="{{ route('game.show', $game['slug']) }}">    
                            <img src="{{ $game['cover']['url']}}" alt="Immagine" class="w-full mb-4 rounded-lg" />
                            <h3 class="text-white text-xl font-bold mb-2">{{ $game['name'] }}</h3>
                            @auth
                                <form id="saveGame-form" method="POST" action="/saveGame" class="absolute mr-4 bottom-4 right-4">
                                    @csrf
                                    <input type="hidden" name="game_id" value="{{ $game['id'] }}">
                                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">Save</button>
                                </form>
                            @endauth
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="w-1/4 p-4 mt-12">
            <x-filter-platforms></x-filter-platforms>
        </div>
    </div>
    @if(isset($currentPage))
        <div id="pagination" class="flex justify-center mt-4">
            @if($currentPage > 1)
                <a href="{{ request()->fullUrlWithQuery(['page' => $currentPage-1]) }}" class="w-24 mr-8 bg-gray-200 hover:bg-gray-500 text-blue-900 font-bold py-2 px-4 rounded-full text-center">Previous</a>
            @endif
            <a href="{{ request()->fullUrlWithQuery(['page' => $currentPage+1]) }}" class="ml-8 w-24 bg-gray-200 hover:bg-gray-500 text-blue-900 font-bold py-2 px-4 rounded-full text-center">Next</a>
        </div>
    @endif
</x-layout>