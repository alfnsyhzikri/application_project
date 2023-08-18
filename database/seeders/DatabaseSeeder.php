<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        User::create([
            'level' => 'Administrator',
            'nik' => '1',
            'nisn' => '1',
            'nm_siswa' => 'zikri',
            'tempat_lahir' => 'Banda Aceh',
            'provinsi' => 'Provinsi Aceh',
            'kabupaten' => 'Kota Banda Aceh',
            'kecamatan' => 'Ulee Kareng',
            'desa' => 'Doi',
            'tgl_lahir' => '2003-01-01',
            'umur' => '20 Tahun',
            'smp' => 'SMP',
            'foto' => 'FOTO',
            'jk' => 'Laki - laki',
            'bb' => 60,
            'tb' => 180,
            'sk' => 3,
            'anak_ke' => 2,
            'agama' => 'Islam',
            'status' => '-',
            'tinggal_bersama' => 'Orang Tua',
            'nmayah' => 'APA',
            'kerja_ayah' => '--',
            'pddkn_ayah' => '--',
            'no_ayah' => '--',
            'alamat_ayah' => '--',
            // 'email' => $request->email,
            'password' => 12345678,
        ]);

            User::create([
            'level' => 'siswa',
            'nik' => '2',
            'nisn' => '2',
            'nm_siswa' => 'Dolah',
            'tempat_lahir' => 'Banda Aceh',
            'provinsi' => 'Provinsi Aceh',
            'kabupaten' => 'Kota Banda Aceh',
            'kecamatan' => 'Ulee Kareng',
            'desa' => 'Doi',
            'tgl_lahir' => '2003-01-01',
            'umur' => '20 Tahun',
            'smp' => 'SMP',
            'foto' => 'FOTO',
            'jk' => 'Laki - laki',
            'bb' => 60,
            'tb' => 180,
            'sk' => 3,
            'anak_ke' => 2,
            'agama' => 'Islam',
            'status' => '-',
            'tinggal_bersama' => 'Orang Tua',
            'nmayah' => 'APA',
            'kerja_ayah' => '--',
            'pddkn_ayah' => '--',
            'no_ayah' => '--',
            'alamat_ayah' => '--',
            // 'email' => $request->email,
            'password' => 12345678,
        ]);
    }
}
