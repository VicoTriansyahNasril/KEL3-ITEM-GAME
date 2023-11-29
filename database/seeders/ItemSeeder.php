<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('items')->insert([
            'nama_item' =>'cash',
            'deskripsi_item' =>'adaa',
            'harga_item' =>'320',
            'stok_item' =>'1'
        ]);

    }
}
