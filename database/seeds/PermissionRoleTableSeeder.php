<?php

use Illuminate\Database\Seeder;

class PermissionRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::table('permission_role')->count() == 0) {
            DB::table('permission_role')->insert([
                'role_id' => 1,
                'permission_id' => 1,
                'created_at' =>  NULL,
                'updated_at' => NULL
            ]);
            DB::table('permission_role')->insert([
                'role_id' => 1,
                'permission_id' => 2,
                'created_at' =>  NULL,
                'updated_at' => NULL
            ]);
            DB::table('permission_role')->insert([
                'role_id' => 1,
                'permission_id' => 3,
                'created_at' =>  NULL,
                'updated_at' => NULL
            ]);
            DB::table('permission_role')->insert([
                'role_id' => 1,
                'permission_id' => 4,
                'created_at' =>  NULL,
                'updated_at' => NULL
            ]);
            DB::table('permission_role')->insert([
                'role_id' => 1,
                'permission_id' => 5,
                'created_at' =>  NULL,
                'updated_at' => NULL
            ]);
            DB::table('permission_role')->insert([
                'role_id' => 1,
                'permission_id' => 7,
                'created_at' =>  NULL,
                'updated_at' => NULL
            ]);
            DB::table('permission_role')->insert([
                'role_id' => 1,
                'permission_id' => 8,
                'created_at' =>  NULL,
                'updated_at' => NULL
            ]);
            DB::table('permission_role')->insert([
                'role_id' => 1,
                'permission_id' => 9,
                'created_at' =>  NULL,
                'updated_at' => NULL
            ]);
            DB::table('permission_role')->insert([
                'role_id' => 1,
                'permission_id' => 6,
                'created_at' =>  NULL,
                'updated_at' => NULL
            ]);
        }
    }
}
