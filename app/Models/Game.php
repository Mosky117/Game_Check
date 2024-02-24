<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $fillable=[0];


    public function formatGameData(array $games){
        // $games = collect($games)->map(function ($game) {
        //     $game['name']='popi';
        //     $game['cover']['url'] = isset($game['cover']['url']) ? str_replace('t_thumb', 't_cover_big', $game['cover']['url']) : asset('imgs/game.png');
        //     return $game;
        // })->all();
        //same result as below
        foreach($games as &$game){
            //the & means that every edit afflicts the actual element of array
            $game['cover']['url'] = isset($game['cover']['url']) ? str_replace('t_thumb', 't_cover_big', $game['cover']['url']) : asset('imgs/game.jpg');
            $game['genres'] = isset($game['genres']) ? implode(', ', collect($game['genres'])->pluck('name')->toArray()) : 'Multiple genres';
            $game['first_release_date'] = isset($game['first_release_date']) ? Carbon::parse($game['first_release_date']) : null;

            if (isset($game['involved_companies'])) {
                $game['involved_companies'] = $game['involved_companies'][0]['company']['name'];
            }
            else{
                $game['involved_companies']=null;
            }

            $game['platforms'] = isset($game['platforms']) ? implode(', ', collect($game['platforms'])->pluck('name')->toArray()) : null;

            $game['similar_games']=isset($game['similar_games'])? implode(', ', collect($game['similar_games'])->pluck('name')->toArray()) : null;
            $game['videos']= isset($game['videos']) ? 'https://youtube.com/embed/' . $game['videos'][0]['video_id'] : null;

            //da capire 
            if (isset($game['screenshots'])) {
                $game['screenshots'] = collect($game['screenshots'])->map(function($screenshot) {
                    return [
                        'big' => Str::replaceFirst('thumb', 'screenshot_huge', $screenshot['url']), 
                        'huge' => isset($screenshot['url']) ? Str::replaceFirst('thumb', 'screenshot_big', $screenshot['url']) : asset('images/sample-game-cover.png')
                    ];
                })->take(9);
            }else{null;}
        }
        unset($game);
        return $games;
    }
}
