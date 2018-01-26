<?php

use Illuminate\Database\Seeder;
use App\kelas;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $kelas1 = kelas::create(['kelas'=>'X']);
        $kelas2 = kelas::create(['kelas'=>'XI']);
        $kelas3 = kelas::create(['kelas'=>'XII']);
    }
}
