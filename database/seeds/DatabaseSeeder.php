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
use App\Model\BusinessType;
use App\Model\VatType;
use App\Model\BusinessInfo;
use App\Model\Company;
use App\Model\Gender;
use App\Model\CivilStatus;


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
        CivilStatus::truncate();
        Gender::truncate();
        BusinessType::truncate();
        VatType::truncate();
        Address::truncate();
        User::truncate();
        Role::truncate();
        Image::truncate();
        Menu::truncate();
        Holding::truncate();
        Branch::truncate();
        Image::truncate();
        BusinessInfo::truncate();
        AccessRight::truncate();
        Company::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        $this->call(CivilStatusTableSeeder::class);
        $this->call(GendersTableSeeder::class);
        $this->call(VatTypesTableSeeder::class);
        $this->call(BusinessTypesTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(MenusTableSeeder::class);
        $this->call(HoldingsTableSeeder::class);
        $this->call(CompaniesTableSeeder::class);
        $this->call(BranchesTableSeeder::class);
        $this->call(ImagesTableSeeder::class);
        $this->call(AccessRightTableSeeder::class);
        $this->call(BusinessInfosTableSeeder::class);
    }
}
