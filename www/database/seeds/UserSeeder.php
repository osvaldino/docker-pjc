<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UserSeeder extends Seeder
{

    static $users = [
        ['name' => 'Usuario', 'email' => "usuario@email.com", 'password' => '123456'],
        ['name' => 'Administrador', 'email' => "admin@email.com", 'password' => '123456'],
        ['name' => 'Testador', 'email' => "tester@email.com", 'password' => '123456']
       ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (self::$users as $user)
            DB::table('users')->insert([
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => bcrypt($user['password']),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
    }
}
