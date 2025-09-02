<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Phrase extends Model
{
    // フレーズ登録可能にする
    protected $fillable = ['japanese', 'sicilian'];
    
    public function favourites()
    {
        return $this->hasMany(Favourite::class);
    }
}
