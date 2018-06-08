<?php

use Illuminate\Database\Seeder;


class FiltersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::table('filters')->count() == 0) {
            DB::table('filters')->insert([
                'title' => 'Brand Identity',
                'alias' => 'brand-identity',
                'created_at' => '2018-06-10 21:00:00',
                'updated_at' => NULL
            ]);
        }
    }
}
