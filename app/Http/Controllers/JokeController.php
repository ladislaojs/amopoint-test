<?php

namespace App\Http\Controllers;

use App\Http\Resources\JokeResource;
use App\Models\Joke;
use Illuminate\Http\Resources\Json\JsonResource;

class JokeController extends Controller
{
    public function getJokes(): JsonResource
    {
        return JokeResource::collection(Joke::all([
            'id', 'type', 'setup', 'punchline'
        ]));
    }
}
