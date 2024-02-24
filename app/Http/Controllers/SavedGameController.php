<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SavedGame;
use Illuminate\Support\Facades\Http;
use App\Models\Game;
use App\Models\User;

class SavedGameController extends Controller
{
    public function getSavedGames(){

        //$user = auth()->user(); // Otteniamo l'utente corrente

        // Otteniamo gli ID dei giochi salvati associati a questo utente
        $savedGameIds = SavedGame::where('user_id', auth()->user()->id)->pluck('game_id')->toArray();

        $twitchController= new TwitchController();

        $response= Http::withHeaders([
            'Client-ID'=>env('TWITCH_CLIENT_ID',''),
            'Authorization'=>'Bearer '.$twitchController->getAccessToken()
        ])->withBody("
            fields name,slug,cover.url,genres.name,first_release_date,involved_companies.company.name,platforms.name,videos.*,screenshots.url,similar_games.name,websites.url;
            where id=(".implode(',', $savedGameIds).");
            sort first_release_date desc;
            limit 30;
        "
        )->post('https://api.igdb.com/v4/games/');

        $games=new Game();

        $formattedGames=$games->formatGameData($response->json());
        return $formattedGames;
    }

    public function index(){
        $games=new SavedGameController();
        $savedGames = SavedGame::where('user_id', auth()->user()->id)->pluck('game_id')->toArray();

        if(count($savedGames)>0){
            return view('sessions/show',[
                'games'=>$games->getSavedGames(),
                'savedGames'=>$savedGames
            ]);
        }else{
            return view('sessions/show-empty');
        }
    }

    public function store(Request $request){
        $request->validate([
            'game_id' => 'required'
        ]);

        $savedGame = new SavedGame();
        $savedGame->game_id = $request->game_id;
        $savedGame->user_id = $request->user()->id;
        $savedGame->save();

        return back()->with('success', 'Gioco salvato con successo!');
    }

    public function destroy(Request $request){
        SavedGame::where('game_id',$request->input('game_id'))->where('user_id',auth()->user()->id)->delete();
        
        return redirect()->back()->with('message','Game removed from your list');
    }
}
