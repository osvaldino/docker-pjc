<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AlbumSeeder extends Seeder
{
   static $albums = [
    ['artist_id' => 1, 'title' => "Harakiri"],
    ['artist_id' => 1, 'title' => "Black Blooms"],
    ['artist_id' => 1, 'title' => "The Rough Dog"],
    ['artist_id' => 2, 'title' => "The Rising Tied"],
    ['artist_id' => 2, 'title' => "Post Traumatic"],
    ['artist_id' => 2, 'title' => "Post Traumatic EP"],
    ['artist_id' => 2, 'title' => "Where'd You Go"],
    ['artist_id' => 3, 'title' => "Bem Sertanejo"],
    ['artist_id' => 3, 'title' => "Bem Sertanejo - O Show (Ao Vivo)"],
    ['artist_id' => 3, 'title' => "Bem Sertanejo - (1ª Temporada) - EP"],
    ['artist_id' => 4, 'title' => "Use Your IIIlusion I"],
    ['artist_id' => 4, 'title' => "Use Your IIIlusion II"],
    ['artist_id' => 4, 'title' => "Greatest Hits"]
   ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (self::$albums as $album)
            DB::table('albums')->insert([
                'artist_id' => $album['artist_id'],
                'title' => $album['title'],
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
    }
}
