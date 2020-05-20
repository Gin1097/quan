<?php

use Illuminate\Database\Seeder;
use Illuminate\PhpVnDataGenerator\VnBase;
use Illuminate\PhpVnDataGenerator\VnFullname;
use Illuminate\PhpVnDataGenerator\VnPersonalInfo;

class XuatkhoTableSeeder extends Seeder
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

        for ($i=1; $i <= 9; $i++) {
            $today = new DateTime();
            array_push($list, [
                'xk_ngaylap'              => $today->format('Y-m-d H:i:s'),
                'xk_diachi'               => "xk_diachi $i",
                'xk_lydo'                 => "xk_lydo $i",
                'xk_tongtien'             => round($faker->randomFloat(99999999, 80000, 6500000), -3),
                'xk_taoMoi'               => $today->format('Y-m-d H:i:s'),
                'xk_capNhat'              => $today->format('Y-m-d H:i:s'),
                'nv_ma'                   => $i
            ]);
        }
        DB::table('xuatkho')->insert($list);
    }
}
