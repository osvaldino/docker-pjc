<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ArtistSeeder extends Seeder
{
    static $artists = [
        "Serj tankian",
        "Mike Shinoda",
        "Michel Teló",
        "Guns N' Roses"
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (self::$artists as $artist)
            DB::table('artists')->insert([
                'name' => $artist,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
    }
}
