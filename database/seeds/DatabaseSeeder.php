<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(SlidersTableSeeder::class);
         $this->call(MenusTableSeeder::class);
         $this->call(FiltersTableSeeder::class);
         $this->call(CategoriesTableSeeder::class);
         $this->call(UsersTableSeeder::class);
         $this->call(ArticlesTableSeeder::class);
         $this->call(CommentsTableSeeder::class);
         $this->call(PortfoliosTableSeeder::class);
    }
}
