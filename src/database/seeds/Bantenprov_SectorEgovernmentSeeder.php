<?php

use Illuminate\Database\Seeder;

class Bantenprov_SectorEgovernmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(Bantenprov_SectorEgovernmentSeeder_SectorEgovernment::class);
    }
}
