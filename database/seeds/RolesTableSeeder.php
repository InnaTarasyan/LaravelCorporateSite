<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::table('roles')->count() == 0) {
            DB::table('roles')->insert([
                'name' => 'Admin',
                'created_at' =>  NULL,
                'updated_at' => NULL
            ]);
            DB::table('roles')->insert([
                'name' => 'Moderator',
                'created_at' =>  NULL,
                'updated_at' => NULL
            ]);
            DB::table('roles')->insert([
                'name' => 'Guest',
                'created_at' =>  NULL,
                'updated_at' => NULL
            ]);
        }
    }
}
