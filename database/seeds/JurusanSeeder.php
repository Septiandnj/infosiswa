<?php

use Illuminate\Database\Seeder;
use App\jurusan;

class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $jurusan1 = Jurusan::create(['jurusan'=>'Informatika']);
    }
}
