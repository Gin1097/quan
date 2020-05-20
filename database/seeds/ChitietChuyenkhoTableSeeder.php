<?php

use Illuminate\Database\Seeder;
use Illuminate\PhpVnDataGenerator\VnBase;
use Illuminate\PhpVnDataGenerator\VnFullname;
use Illuminate\PhpVnDataGenerator\VnPersonalInfo;

class ChitietChuyenkhoTableSeeder extends Seeder
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

        for ($i=1; $i <= 3; $i++) {
            $today = new DateTime();
            array_push($list, [
                'ck_ma'                    => $i,
                'sp_ma'                    => $i,
                'ctck_soluong'             => $i,
                'ctck_thanhtien'           => round($faker->randomFloat(99999999, 80000, 6500000), -3),
                'khocu_ma'                 => $i,
                'khomoi_ma'                => $i
            ]);
        }
        DB::table('chitiet_chuyenkho')->insert($list);
    }
}
