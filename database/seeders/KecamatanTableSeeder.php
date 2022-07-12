<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class KecamatanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $kecamatan = array(
            array(
            'riwayat_singkat'=> 'kecamatan mendahara ulu adalah kecamatan yang pintar dan maju.',
            'visi'=> 'Menjadi Perusahaan pangan yang unggul dan terpercaya dalam mendukung terwujudnya kedaulatan pangan.',
            'misi'=> 'Menjalankan usaha logistik pangan pokok dengan mengutamakan layanan kepada masyarakat; Melaksanakan praktik manajemen unggul dengan dukungan sumber daya manusia yang profesional, teknologi yang terdepan dan sistem yang terintegarasi; Menerapkan prinsip tata kelola perusahaan yang baik serta senantiasa melakukan perbaikan yang berkelanjutan; Menjamin ketersediaan, keterjangkauan, dan stabilitas komoditas pangan pokok.',
            ),
            );
    
            //MASUKKAN DATA KE DATABASE
            DB::table('Kecamatan')->insert($kecamatan); 
    }
}
