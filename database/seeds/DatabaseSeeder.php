<?php

use Illuminate\Database\Seeder;
use App\Model\User;
use App\Model\Role;
use App\Model\Image;
use App\Model\Holding;
use App\Model\Branch;
use App\Model\Menu;
use App\Model\Address;
use App\Model\AccessRight;
use App\Model\Permission;

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
        Address::truncate();
        Permission::truncate();
        User::truncate();
        Role::truncate();
        Image::truncate();
        Menu::truncate();
        Holding::truncate();
        Branch::truncate();
        Image::truncate();
        AccessRight::truncate();

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(MenusTableSeeder::class);
        $this->call(HoldingsTableSeeder::class);
        $this->call(BranchesTableSeeder::class);
        $this->call(ImagesTableSeeder::class);
        $this->call(AccessRightTableSeeder::class);
        $this->call(PermissionTableSeeder::class);
    }
}
