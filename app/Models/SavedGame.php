<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SavedGame extends Model
{
    use HasFactory;

    // public function saveGame(){
    //     return $this->belongsTo(User::class);
    // }
    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
