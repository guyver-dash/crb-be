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
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(NormalBalanceTableSeeder::class);
        $this->call(ChartAccountTableSeeder::class);
        $this->call(TaxTypeTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(MenusTableSeeder::class);
        $this->call(AccessRightTableSeeder::class);
    }
}
