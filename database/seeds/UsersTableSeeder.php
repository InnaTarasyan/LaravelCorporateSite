<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::table('users')->count() == 0) {
            DB::table('users')->insert([
                'name' => 'User',
                'email' => 'user@mail.ru',
                'password' => '$2y$10$WGH9LJAqL4Ma.9nrrb/mreS08IiCQXD8dzfCvv4qx.7T9bmOxmrtS',
                'remember_token' => '8N6ikNE1o806YKGvRf6ILDqykxgrMV2h40SSg1YUnvuypIwK85RaFpKoTQKS',
                'created_at' => '2018-06-17 21:00:00',
                'updated_at' => '2018-06-17 21:00:00'
            ]);

            DB::table('users')->insert([
                'name' => 'User2',
                'email' => 'user2@mail.ru',
                'password' => '123456',
                'remember_token' => NULL,
                'created_at' => '2018-06-17 21:00:00',
                'updated_at' => '2018-06-17 21:00:00'
            ]);

            DB::table('users')->insert([
                'name' => 'User3',
                'email' => 'user3@mail.ru',
                'password' => '$2y$10$a.iN9ngVcyys97.sdjRSm.cZL0HUmL5nMy28yxlClxH977PYPKm.S',
                'remember_token' => 'qhXknZbfzSpYi6o1ZN9W9VGM99O9myEdd6iiubgp2BnTgjFkHn8usn458D4l',
                'created_at' => '2018-06-17 21:00:00',
                'updated_at' => '2018-06-17 21:00:00'
            ]);
        }
    }
}
