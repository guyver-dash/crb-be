<?php

use Illuminate\Database\Seeder;
use App\Model\Relationship;

class RelationshipTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $relationships =  ['Father', 'Mother', 'Son', 'Daughter', 'Grandparent', 'Brother', 'Sister', 'Nephew', 'Niece', 'Father-in-law', 'Mother-in-law', 'Brother-in-law', 'Sister-in-law', 'Relative', 'Husband', 'Wife'];
    }
}
