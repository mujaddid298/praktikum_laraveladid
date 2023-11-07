<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('berita')->insert([
            'judul' => 'Berita Hot',
            'deskripsi' => 'Ini Berita',
            'isi' => 'Mau Tau Gak?',
        ]);
    }
}