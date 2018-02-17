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

        $sector_egovernments = (object) [
            (object) [
                'label' => 'Sektor Sarana dan Prasarana',
                'description' => '',
            ],
            (object) [
                'label' => 'Sektor Pemerintahan',
                'description' => '',
            ],
            (object) [
                'label' => 'Sektor Pembangunan',
                'description' => '',
            ],
            (object) [
                'label' => 'Sektor Pelayanan',
                'description' => '',
            ],
            (object) [
                'label' => 'Sektor Legislatif',
                'description' => '',
            ],
            (object) [
                'label' => 'Sektor Kewilayahan',
                'description' => '',
            ],
            (object) [
                'label' => 'Sektor Keuangan',
                'description' => '',
            ],
            (object) [
                'label' => 'Sektor Kepegawaian',
                'description' => '',
            ],
            (object) [
                'label' => 'Sektor Kemasyarakatan',
                'description' => '',
            ],
            (object) [
                'label' => 'Sektor Administrasi dan Manajemen',
                'description' => '',
            ],
        ];

        foreach ($sector_egovernments as $sector_egovernment) {
            $model = SectorEgovernment::updateOrCreate(
                [
                    'label' => $sector_egovernment->label,
                ],
                [
                    'description' => $sector_egovernment->description,
                ]
            );
            $model->save();
        }
	}
}
