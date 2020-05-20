<?php

use Illuminate\Database\Seeder;
use Illuminate\PhpVnDataGenerator\VnBase;
use Illuminate\PhpVnDataGenerator\VnFullname;
use Illuminate\PhpVnDataGenerator\VnPersonalInfo;

class SanphamKhoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [];
        $uFN = new VnFullname();
        $uPI = new VnPersonalInfo();
        $faker = Faker\Factory::create();

        for ($i=1; $i <= 10; $i++) {
            $today = new DateTime();
            array_push($list, [
                'kho_ma'                   => $i,
                'sp_ma'                    => $i,
                'spk_taoMoi'               => $today->format('Y-m-d H:i:s'),
                'spk_capNhat'              => $today->format('Y-m-d H:i:s'),
                'sl_nhap'                  => $i,
                'sl_xuat'                  => $i,
                'sl_ton'                   => $i
            ]);
        }
        DB::table('sanphamkho')->insert($list);
    }
}
