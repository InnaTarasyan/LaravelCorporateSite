<?php

use Illuminate\Database\Seeder;


class SlidersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::table('sliders')->count() == 0) {
            DB::table('sliders')->insert([
                'img' => 'xx.jpg',
                'desc' => 'Nam id quam a odio euismod pellentesque. Etiam congue rutrum risus non vestibulum. Quisque a diam at ligula blandit consequat. Mauris ac mi velit, a tempor neque',
                'title' => '<h2 style="color:#fff">CORPORATE, MULTIPURPOSE.. <br /><span>PINK RIO</span></h2>',
                'created_at' => NULL,
                'updated_at' => NULL
            ]);

            DB::table('sliders')->insert([
                'img' => '00314.jpg',
                'desc' => 'Nam id quam a odio euismod pellentesque. Etiam congue rutrum risus non vestibulum. Quisque a diam at ligula blandit consequat. Mauris ac mi velit, a tempor neque',
                'title' => '<h2 style="color:#fff">PINKRIO. <span>STRONG AND POWERFUL.</span></h2>',
                'created_at' => NULL,
                'updated_at' => NULL
            ]);

            DB::table('sliders')->insert([
                'img' => 'dd.jpg',
                'desc' => 'Nam id quam a odio euismod pellentesque. Etiam congue rutrum risus non vestibulum. Quisque a diam at ligula blandit consequat. Mauris ac mi velit, a tempor neque',
                'title' => '<h2 style="color:#fff">PINKRIO. <span>STRONG AND POWERFUL.</span></h2>',
                'created_at' => NULL,
                'updated_at' => NULL
            ]);
        }
    }
}
