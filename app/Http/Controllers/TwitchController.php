<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TwitchController extends Controller
{
    public function getAccessToken()
    {
        $response = Http::post('https://id.twitch.tv/oauth2/token', [
            'client_id' => env('TWITCH_CLIENT_ID',''),
            'client_secret' => env('TWITCH_CLIENT_SECRET',''),
            'grant_type' => 'client_credentials',
        ]);

        return $response->json()['access_token'];
    }
}
