<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\TwitchController;
use App\Models\Game;
use Illuminate\Pagination\LengthAwarePaginator;



class GameController extends Controller
{
    public function getGameData(Request $request, $platforms){
        $twitchController = new TwitchController();
        $now = time();
    
        $platformsString = implode(',', $platforms);
        $limit = $request->input('limit', 24);
        $page = $request->input('page', 1);
    
        $response = Http::withHeaders([
            'Client-ID' => env('TWITCH_CLIENT_ID',''),
            'Authorization' => 'Bearer ' . $twitchController->getAccessToken()
        ])->withBody("
            fields name,slug,cover.url,genres.name,summary,first_release_date,involved_companies.company.name,platforms.name,videos.*,screenshots.url,similar_games.name,websites.url;
            where first_release_date<{$now} & release_dates.platform=({$platformsString});
            sort first_release_date desc;
            limit " . ($limit * $page) . ";
        ", 'text/plain')
        ->post('https://api.igdb.com/v4/games/');
    
        $games = new Game();
        $formattedGames = $games->formatGameData($response->json());
    
        return $formattedGames;
    }
    
    public function getPaginatedGames(Request $request, $platforms=[4,5,6,7,8,9,11,12,20,37,38,41,45,46,48,49,165,160,130,131,167,169]) {
        
        $formattedGames = $this->getGameData($request,$platforms);
    
        $limit = $request->input('limit', 24);
        $page = $request->input('page', 1);
    
        $paginatedItems = new LengthAwarePaginator(
            array_slice($formattedGames, ($page - 1) * $limit, $limit),
            count($formattedGames),
            $limit,
            $page
        );
    
        return view('homepage.show', [
            'games' => $paginatedItems,
            'currentPage' => $paginatedItems->currentPage()
        ]);
    }


    

    public function sortByPlatforms(Request $request){
        $platforms = array_map('intval', $request->input('platforms'));
        $games = new GameController();
        return $games->getPaginatedGames($request, $platforms);
    }
    // public function show(Request $request, $slug) {

    //     $games = new GameController();
    //     $response = $games->getGameData($request,);
    //     $formattedGames = collect($response->games);
    //     $game = $formattedGames->firstWhere('slug', $slug);

    //     return view('game.show', [
    //         'game' => $game
    //     ]);
    // }
    public function show($slug) {
        $twitchController = new TwitchController();
    
        $slugValue='"'.$slug.'"';
        $response = Http::withHeaders([
            'Client-ID' => env('TWITCH_CLIENT_ID',''),
            'Authorization' => 'Bearer ' . $twitchController->getAccessToken()
        ])->withBody("
            fields name,slug,cover.url,genres.name,summary,first_release_date,involved_companies.company.name,platforms.name,videos.*,screenshots.url,similar_games.name,websites.url;
            where slug={$slugValue};
        ", 'text/plain')
        ->post('https://api.igdb.com/v4/games/');
    
        $games = new Game();
        $formattedGame = $games->formatGameData($response->json());

        return view('game.show', [
            'game' => $formattedGame[0]
        ]);
    }

    
    public function searchGames(Request $request){
        $request->validate([
            'search'=>'required'
        ]);
        $searchValue = '"' . $request->search . '"';

        $twitchController= new TwitchController();

        $response= Http::withHeaders([
            'Client-ID'=>env('TWITCH_CLIENT_ID',''),
            'Authorization'=>'Bearer '.$twitchController->getAccessToken()
        ])->withBody("
            fields name,slug,cover.url,genres.name,summary,first_release_date,involved_companies.company.name,platforms.name,videos.*,screenshots.url,similar_games.name,websites.url;
            search {$searchValue};
            limit 500;
        ", 'text/plain'
        )->post('https://api.igdb.com/v4/games/');

        $games=new Game();
        $formattedGames=$games->formatGameData($response->json());

        return view('homepage.show',[
            'games'=>$formattedGames
        ]);
    }
}