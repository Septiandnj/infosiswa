<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;
class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRole = new Role();
        $adminRole->name = "admin";
        $adminRole->display_name = "Admin";
        $adminRole->save();

        // membuat role member
        $guruRole = new Role();
        $guruRole->name = "Guru";
        $guruRole->display_name = "Guru";
        $guruRole->save();

        // membuat role member
        $siswaRole = new Role();
        $siswaRole->name = "Siswa";
        $siswaRole->display_name = "Siswa";
        $siswaRole->save();

        // membuat sample admin
        $admin= new User();
        $admin->name = "Admin Informasi";
        $admin->email = "admin@gmail.com";
        $admin->password = bcrypt('rahasia');
        $admin->is_verified = 1;
        $admin->save();
        $admin->attachRole($adminRole);

        // membuat sample guru
        $guru= new User();
        $guru->name = "Sample guru";
        $guru->email = "guru@gmail.com";
        $guru->password = bcrypt('rahasia');
        $guru->is_verified = 1;
        $guru->save();
        $guru->attachRole($guruRole);

                // membuat sample guru
        $siswa= new User();
        $siswa->name = "Sample siswa";
        $siswa->email = "siswa@gmail.com";
        $siswa->password = bcrypt('rahasia');
        $siswa->is_verified = 1;
        $siswa->save();
        $siswa->attachRole($siswaRole);

    }
}
