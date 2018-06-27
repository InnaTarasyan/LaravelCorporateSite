<?php

use Illuminate\Database\Seeder;

class RoleUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::table('role_user')->count() == 0) {
            DB::table('role_user')->insert([
                'user_id' => 1,
                'role_id' => 1,
                'created_at' =>  NULL,
                'updated_at' => NULL
            ]);
            DB::table('role_user')->insert([
                'user_id' => 3,
                'role_id' => 3,
                'created_at' =>  NULL,
                'updated_at' => NULL
            ]);
        };

    }
}
