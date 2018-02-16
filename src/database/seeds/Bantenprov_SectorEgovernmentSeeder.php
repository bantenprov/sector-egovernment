<?php

use Bantenprov\SectorEgovernment\Models\Bantenprov\SectorEgovernment\SectorEgovernment;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class Bantenprov_SectorEgovernmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
	public function run()
	{
		Model::unguard();

        $sector_egovernment = SectorEgovernment::updateOrCreate(
            [
                'label' => 'G2G',
            ],
            [
                'description' => 'Goverment to Goverment',
            ]
        );
        $sector_egovernment->save();

        $sector_egovernment = SectorEgovernment::updateOrCreate(
            [
                'label' => 'G2E',
            ],
            [
                'description' => 'Goverment to Employee',
            ]
        );
        $sector_egovernment->save();

        $sector_egovernment = SectorEgovernment::updateOrCreate(
            [
                'label' => 'G2C',
            ],
            [
                'description' => 'Goverment to Citizen',
            ]
        );
        $sector_egovernment->save();

        $sector_egovernment = SectorEgovernment::updateOrCreate(
            [
                'label' => 'G2B',
            ],
            [
                'description' => 'Goverment to Business',
            ]
        );
        $sector_egovernment->save();
	}
}