<?php

use Illuminate\Database\Seeder;
use Illuminate\PhpVnDataGenerator\VnBase;
use Illuminate\PhpVnDataGenerator\VnFullname;
use Illuminate\PhpVnDataGenerator\VnPersonalInfo;

class KhoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [];

        $categories = ["An Giang", "Bà Rịa - Vũng Tàu", "Bắc Giang", "Bắc Kạn", "Bạc Liêu", "Bắc Ninh", "Bến Tre", 
                       "Bình Định", "Bình Dương", "Bình Phước", "Bình Thuận", "Cà Mau", "Cao Bằng", "Đắk Lắk", 
                       "Đắk Nông", "Điện Biên", "Đồng Nai", "Đồng Tháp", "Gia Lai", "Hà Giang", "Hà Nam", "Hà Tĩnh",
                       "Hải Dương", "Hậu Giang", "Hòa Bình", "Hưng Yên", "Khánh Hòa", "Kiên Giang", "Kon Tum", "",
                       "Lai Châu", "Lâm Đồng", "Lạng Sơn", "Lào Cai", "Long An", "Nam Định", "Nghệ An", "Ninh Bình",
                       "Ninh Thuận", "Phú Thọ", "Quảng Bình", "Quảng Nam", "Quảng Ngãi", "Quảng Ninh", "Quảng Trị",
                       "Sóc Trăng", "Sơn La", "Tây Ninh", "Thái Bình", "Thái Nguyên", "Thanh Hóa", "Thừa Thiên Huế",
                       "Tiền Giang", "Trà Vinh", "Tuyên Quang", "Vĩnh Long", "Vĩnh Phúc", "Yên Bái", "Phú Yên", "Cần Thơ",
                       "Đà Nẵng", "Hải Phòng", "Hà Nội", "TP HCM"];
        sort($categories);

        $today = new DateTime('2020-01-01 08:00:00');

        for ($i=1; $i <= count($categories); $i++) {
            array_push($list, [
                'kho_ten'           => $categories[$i-1],
                'kho_diachi'        => "kho_diachi $i",
                'kho_sdt'           => "1800190$i",
                'kho_quanly'        => $i,
                'kho_dienGiai'      => $categories[$i-1],        
                'kho_taoMoi'        => $today->format('Y-m-d H:i:s'),
                'kho_capNhat'       => $today->format('Y-m-d H:i:s'),
                'kho_trangThai'     =>$i
            ]);
        }
        DB::table('kho')->insert($list);
    }
}
