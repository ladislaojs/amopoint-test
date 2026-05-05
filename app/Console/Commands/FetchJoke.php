<?php

namespace App\Console\Commands;

use App\Models\Joke;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

#[Signature('app:fetch-joke')]
#[Description('Gets a random joke from an API and saves it locally')]
class FetchJoke extends Command
{
    /**
     * Execute the console command.
     */
    public function handle()
    {
        $response = Http::get(config('app.api_urls.jokes'));
        $data = $response->json();
        Joke::updateOrCreate([$data['id']], $response->json());
    }
}
