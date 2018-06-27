<?php

use Illuminate\Database\Seeder;


class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::table('menus')->count() == 0) {
            DB::table('menus')->insert([
                'title' => 'Home',
                'path' =>  env('APP_URL'),
                'parent' => 0,
                'created_at' => NULL,
                'updated_at' => NULL
            ]);

            DB::table('menus')->insert([
                'title' => 'Blog',
                'path' =>  env('APP_URL').'/articles',
                'parent' => 0,
                'created_at' => NULL,
                'updated_at' => NULL
            ]);

            DB::table('menus')->insert([
                'title' => 'Computers',
                'path' =>  env('APP_URL').'/articles/cat/computers',
                'parent' => 2,
                'created_at' => NULL,
                'updated_at' => NULL
            ]);

            DB::table('menus')->insert([
                'title' => 'Interesting',
                'path' =>  env('APP_URL').'/articles/cat/interesting',
                'parent' => 2,
                'created_at' => NULL,
                'updated_at' => NULL
            ]);

            DB::table('menus')->insert([
                'title' => 'Advices',
                'path' =>  env('APP_URL').'/articles/cat/soveti',
                'parent' => 2,
                'created_at' => NULL,
                'updated_at' => NULL
            ]);

            DB::table('menus')->insert([
                'title' => 'Portfolio',
                'path' =>  env('APP_URL').'/portfolios',
                'parent' => 0,
                'created_at' => NULL,
                'updated_at' => NULL
            ]);

            DB::table('menus')->insert([
                'title' => 'Contacts',
                'path' =>  env('APP_URL').'/contacts',
                'parent' => 0,
                'created_at' => NULL,
                'updated_at' => NULL
            ]);


        }
    }
}
