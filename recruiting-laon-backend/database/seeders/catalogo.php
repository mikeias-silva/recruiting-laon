<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class catalogo extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $json = Storage::disk('local')->get('/json/movies.json');
        $movies = json_decode($json, true);

        foreach ($movies as $movie) {
            Movie::query()->updateOrCreate([
                'title' => $movie['title'],
                'id_imdb' => $movie['id_imdb']
            ]);
        }
    }
}
