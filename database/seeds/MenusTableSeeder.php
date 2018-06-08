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
                'path' => 'http://corporativesite.com/',
                'parent' => 0,
                'created_at' => NULL,
                'updated_at' => NULL
            ]);

            DB::table('menus')->insert([
                'title' => 'Blog',
                'path' => 'http://corporativesite.com/articles',
                'parent' => 0,
                'created_at' => NULL,
                'updated_at' => NULL
            ]);

            DB::table('menus')->insert([
                'title' => 'Computers',
                'path' => 'http://corporativesite.com/articles/cat/computers',
                'parent' => 3,
                'created_at' => NULL,
                'updated_at' => NULL
            ]);

            DB::table('menus')->insert([
                'title' => 'Interesting',
                'path' => 'http://corporativesite.com/articles/cat/iteresting',
                'parent' => 3,
                'created_at' => NULL,
                'updated_at' => NULL
            ]);

            DB::table('menus')->insert([
                'title' => 'Advices',
                'path' => 'http://corporativesite.com/articles/cat/soveti',
                'parent' => 3,
                'created_at' => NULL,
                'updated_at' => NULL
            ]);

            DB::table('menus')->insert([
                'title' => 'Portfolio',
                'path' => 'http://corporativesite.com/portfolios',
                'parent' => 0,
                'created_at' => NULL,
                'updated_at' => NULL
            ]);

            DB::table('menus')->insert([
                'title' => 'Contacts',
                'path' => 'http://corporativesite.com/contacts',
                'parent' => 0,
                'created_at' => NULL,
                'updated_at' => NULL
            ]);


        }
    }
}
