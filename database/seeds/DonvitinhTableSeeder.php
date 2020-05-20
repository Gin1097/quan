<?php

use Illuminate\Database\Seeder;
use Illuminate\PhpVnDataGenerator\VnBase;
use Illuminate\PhpVnDataGenerator\VnFullname;
use Illuminate\PhpVnDataGenerator\VnPersonalInfo;

class DonvitinhTableSeeder extends Seeder
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
                'dvt_ten'                  => "dvt_ten $i",
                'dvt_taoMoi'               => $today->format('Y-m-d H:i:s'),
                'dvt_capNhat'              => $today->format('Y-m-d H:i:s'),
                'dvt_trangThai'            =>$i
            ]);
        }
        DB::table('donvitinh')->insert($list);
    }
}
