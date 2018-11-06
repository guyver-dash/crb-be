<?php

use Illuminate\Database\Seeder;
use App\Model\User;
use App\Model\Category;
use App\Model\SubCategory;
use App\Model\FurtherCategory;
use App\Model\Unit;
use App\Model\Role;
use App\Model\Item;
use App\Model\Image;
use App\Model\Color;
use App\Model\Size;
use App\Model\Store;
use App\Model\Branch;
use App\Model\Menu;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        User::truncate();
        Role::truncate();
        Image::truncate();
        Menu::truncate();
        Branch::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(MenusTableSeeder::class);
        $this->call(BranchesTableSeeder::class);
        $this->call(ItemsTableSeeder::class);
        $this->call(ImagesTableSeeder::class);
    }
}
