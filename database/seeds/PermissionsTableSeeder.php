<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::table('permissions')->count() == 0) {
            DB::table('permissions')->insert([
                'name' => 'VIEW_ADMIN',
                'created_at' =>  NULL,
                'updated_at' => NULL
            ]);
            DB::table('permissions')->insert([
                'name' => 'ADD_ARTICLES',
                'created_at' =>  NULL,
                'updated_at' => NULL
            ]);
            DB::table('permissions')->insert([
                'name' => 'UPDATE_ARTICLES',
                'created_at' =>  NULL,
                'updated_at' => NULL
            ]);
            DB::table('permissions')->insert([
                'name' => 'DELETE_ARTICLES',
                'created_at' =>  NULL,
                'updated_at' => NULL
            ]);
            DB::table('permissions')->insert([
                'name' => 'ADMIN_USERS',
                'created_at' =>  NULL,
                'updated_at' => NULL
            ]);
            DB::table('permissions')->insert([
                'name' => 'VIEW_ADMIN_ARTICLES',
                'created_at' =>  NULL,
                'updated_at' => NULL
            ]);
            DB::table('permissions')->insert([
                'name' => 'EDIT_USERS',
                'created_at' =>  NULL,
                'updated_at' => NULL
            ]);
            DB::table('permissions')->insert([
                'name' => 'VIEW_ADMIN_MENU',
                'created_at' =>  NULL,
                'updated_at' => NULL
            ]);
            DB::table('permissions')->insert([
                'name' => 'EDIT_MENU',
                'created_at' =>  NULL,
                'updated_at' => NULL
            ]);
        }
    }
}
