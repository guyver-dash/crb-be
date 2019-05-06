<?php

use Illuminate\Database\Seeder;
use App\Model\MasterSetup\AgriculturalPurpose;

class AgriculturalPurposeTableSeeder extends Seeder
{    
    public function run()
    {
        $agriculturalPurpose = ['Agricultural production', 'Promotion of agribusiness and exports', 'Acquisition of work animals, farm and fishery equipment and machinery', 'Acquisition of seeds, fertilizers, poultry, livestock, feeds and other similar items', 'Acquisition of lands authorized under the Agrarian Reform Code of the Philippines and its amendments', 'Construction, acquisition and repair of facilities for production, processing, storage and marketing and such other facilities in support of agriculture and fisheries', 'Efficient and effective merchandising of agricultural and fishery commodities stored and/or processed by the facilities aforecited in domestic and foreign commerce', 'Other activities identified in Section 23 of R.A. No. 8435'];

        foreach ($agriculturalPurpose as $value) {
        	
        	AgriculturalPurpose::create([
        			'name' => $value
        		]);
        }
    }
}
