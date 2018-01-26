<?php

use Illuminate\Database\Seeder;
use App\mapel;

class MapelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $mapel1 = mapel::create(['mapel'=>'Matematika']);
        $mapel2 = mapel::create(['mapel'=>'IPA']);
        $mapel3 = mapel::create(['mapel'=>'Bahasa Indonesia']);
    }
}
