<?php

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::table('comments')->count() == 0) {
            DB::table('comments')->insert([
                'text' => 'Hello world',
                'name' => 'name',
                'email' => 'email@mail.ru',
                'site' => 'http://site.ru',
                'parent_id' => 0,
                'created_at' => '2018-06-21 21:00:00',
                'updated_at' => NULL,
                'article_id' => 6,
                'user_id' => NULL
            ]);

            DB::table('comments')->insert([
                'text' => 'Hello world',
                'name' => 'name',
                'email' => 'email@mail.ru',
                'site' => 'http://site.ru',
                'parent_id' => 0,
                'created_at' => '2018-06-21 21:00:00',
                'updated_at' => NULL,
                'article_id' => 7,
                'user_id' => 1
            ]);

            DB::table('comments')->insert([
                'text' => 'Text',
                'name' => 'name',
                'email' => 'email@mail.ru',
                'site' => 'http://site.ru',
                'parent_id' => 0,
                'created_at' => '2018-06-21 21:00:00',
                'updated_at' => NULL,
                'article_id' => 8,
                'user_id' => 1
            ]);

            DB::table('comments')->insert([
                'text' => 'Text',
                'name' => 'name',
                'email' => 'email@mail.ru',
                'site' => 'http://site.ru',
                'parent_id' => 3,
                'created_at' => '2018-06-21 21:00:00',
                'updated_at' => NULL,
                'article_id' => 6,
                'user_id' => 1
            ]);

            DB::table('comments')->insert([
                'text' => 'Hello Tomas',
                'name' => 'name',
                'email' => 'tomas@mail.ru',
                'site' => 'http://site.ru',
                'parent_id' => 3,
                'created_at' => '2018-06-21 21:00:00',
                'updated_at' => NULL,
                'article_id' => 6,
                'user_id' => 1
            ]);

            DB::table('comments')->insert([
                'text' => 'Hello World!',
                'name' => 'name',
                'email' => 'email@mail.ru',
                'site' => 'http://site.ru',
                'parent_id' => 5,
                'created_at' => '2018-06-21 21:00:00',
                'updated_at' => NULL,
                'article_id' => 6,
                'user_id' => NULL
            ]);

            DB::table('comments')->insert([
                'text' => 'Comment!',
                'name' => 'name',
                'email' => 'email@mail.ru',
                'site' => 'http://site.ru',
                'parent_id' => 1,
                'created_at' => '2018-06-21 21:00:00',
                'updated_at' => NULL,
                'article_id' => 6,
                'user_id' => 1
            ]);

            DB::table('comments')->insert([
                'text' => 'Hello World!',
                'name' => 'name',
                'email' => 'email@mail.ru',
                'site' => 'http://site.ru',
                'parent_id' => 2,
                'created_at' => '2018-06-21 21:00:00',
                'updated_at' => NULL,
                'article_id' => 6,
                'user_id' => 1
            ]);

            DB::table('comments')->insert([
                'text' => 'Text!',
                'name' => 'name',
                'email' => 'email@mail.ru',
                'site' => '',
                'parent_id' => 0,
                'created_at' => '2018-06-21 21:00:00',
                'updated_at' => '2018-06-21 21:00:00',
                'article_id' => 6,
                'user_id' => NULL
            ]);

        }
    }
}
