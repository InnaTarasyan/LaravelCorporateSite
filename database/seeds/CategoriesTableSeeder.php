<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::table('categories')->count() == 0) {
            DB::table('categories')->insert([
                'title' => 'Blog',
                'parent_id' => '0',
                'alias' => 'blog',
                'created_at' => NULL,
                'updated_at' => NULL
            ]);

            DB::table('categories')->insert([
                'title' => 'Computers',
                'parent_id' => 1,
                'alias' => 'computers',
                'created_at' => '2018-06-17 21:00:00',
                'updated_at' => NULL
            ]);

            DB::table('categories')->insert([
                'title' => 'Interesting',
                'parent_id' => 1,
                'alias' => 'interesting',
                'created_at' => '2018-06-17 21:00:00',
                'updated_at' => '2018-06-17 21:00:00'
            ]);

            DB::table('categories')->insert([
                'title' => 'Advices',
                'parent_id' => 1,
                'alias' => 'advices',
                'created_at' => '2018-06-17 21:00:00',
                'updated_at' => NULL
            ]);
        }
    }
}
