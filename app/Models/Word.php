<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Word extends Model
{
    // ワード登録可能にする
    protected $fillable = ['japanese', 'sicilian'];
}
