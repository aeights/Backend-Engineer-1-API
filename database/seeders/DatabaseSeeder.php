<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Cuti;
use App\Models\Karyawan;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Karyawan::insert(
            [
                [
                    "nomor_induk" => "IP06001",
                    "nama" => "Agus",
                    "alamat" => "Jln Gaja Mada no 12, Surabaya",
                    "tanggal_lahir" => "1980-1-11",
                    "tanggal_bergabung" => "2005-8-7"
                ],
                [
                    "nomor_induk" => "IP06002",
                    "nama" => "Amin",
                    "alamat" => "Jln Imam Bonjol no 11, Mojokerto",
                    "tanggal_lahir" => "1977-9-3",
                    "tanggal_bergabung" => "2005-8-7"
                ],
                [
                    "nomor_induk" => "IP06003",
                    "nama" => "Yusuf",
                    "alamat" => "Jln A Yani Raya 15 No 14 Malang",
                    "tanggal_lahir" => "1973-8-9",
                    "tanggal_bergabung" => "2006-8-7"
                ],
                [
                    "nomor_induk" => "IP06004",
                    "nama" => "Alyssa",
                    "alamat" => "Jln Bungur Sari V no 166, Bandung",
                    "tanggal_lahir" => "1983-3-18",
                    "tanggal_bergabung" => "2006-9-6"
                ],
                [
                    "nomor_induk" => "IP06005",
                    "nama" => "Maulana",
                    "alamat" => "Jln Candi Agung, No 78 Gg 5, Jakarta",
                    "tanggal_lahir" => "1978-11-10",
                    "tanggal_bergabung" => "2006-9-10"
                ],
                [
                    "nomor_induk" => "IP06006",
                    "nama" => "Agfika",
                    "alamat" => "Jln Nangka, Jakarta Timur",
                    "tanggal_lahir" => "1979-2-7",
                    "tanggal_bergabung" => "2007-1-2"
                ],
                [
                    "nomor_induk" => "IP06007",
                    "nama" => "James",
                    "alamat" => "Jln Merpati, 8 Surabaya",
                    "tanggal_lahir" => "1989-5-18",
                    "tanggal_bergabung" => "2007-4-4"
                ],
                [
                    "nomor_induk" => "IP06008",
                    "nama" => "Octavanus",
                    "alamat" => "Jln A Yani 17, B 08 Sidoarjo",
                    "tanggal_lahir" => "1985-4-14",
                    "tanggal_bergabung" => "2007-5-19"
                ],
                [
                    "nomor_induk" => "IP06009",
                    "nama" => "Nugroho",
                    "alamat" => "Jln Duren tiga 167, Jakarta Selatan",
                    "tanggal_lahir" => "1984-1-1",
                    "tanggal_bergabung" => "2008-1-16"
                ],
                [
                    "nomor_induk" => "IP060010",
                    "nama" => "Raisa",
                    "alamat" => "Jln Kelapa Sawit, Jakarta Selatan",
                    "tanggal_lahir" => "1990-12-17",
                    "tanggal_bergabung" => "2008-8-16"
                ]
            ]
        );

        Cuti::insert(
            [
                [
                    'nomor_induk' => 'IP06001',
                    'tanggal_cuti' => '2020-8-2',
                    'lama_cuti' => '2',
                    'keterangan' => 'Acara Keluarga'
                ],
                [
                    'nomor_induk' => 'IP06001',
                    'tanggal_cuti' => '2020-8-18',
                    'lama_cuti' => '2',
                    'keterangan' => 'Anak Sakit'
                ],
                [
                    'nomor_induk' => 'IP06006',
                    'tanggal_cuti' => '2020-8-19',
                    'lama_cuti' => '1',
                    'keterangan' => 'Nenek Sakit'
                ],
                [
                    'nomor_induk' => 'IP06007',
                    'tanggal_cuti' => '2020-8-23',
                    'lama_cuti' => '1',
                    'keterangan' => 'Sakit'
                ],
                [
                    'nomor_induk' => 'IP06004',
                    'tanggal_cuti' => '2020-8-29',
                    'lama_cuti' => '5',
                    'keterangan' => 'Menikah'
                ],
                [
                    'nomor_induk' => 'IP06003',
                    'tanggal_cuti' => '2020-8-30',
                    'lama_cuti' => '2',
                    'keterangan' => 'Acara Keluarga'
                ],
            ]
        );
    }
}
