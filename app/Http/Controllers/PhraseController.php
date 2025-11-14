<?php

namespace App\Http\Controllers;

use App\Models\Phrase;
use Illuminate\Http\Request;

class PhraseController extends Controller
{
    /**
     * Get phrases with pagination
     */
    public function getPhrases(Request $request)
    {
        return Phrase::paginate(10);
    }
}
