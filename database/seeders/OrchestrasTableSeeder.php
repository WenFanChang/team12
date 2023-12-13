<?php

namespace Database\Seeders;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
 
class OrchestrasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function generateRandomName() {
        $name = array( 'Beyond', 'S.H.E',  'Maroon',  'Westlife', 
              'Spice Girls', 'BIGBANG', 'SUPER JUNIOR', '2NE1',
               'EXO', 'The Beatles', 'The Rolling Stones', 'BLACKPINK',
               'AKB48', 'Iz*One', 'BTS','SMAP');
              return $name[rand(0,count($name)-1)];       

    }

    public function generateRandomCompany() {
        $company = array(
            '環球音樂', '索尼音樂', '華納音樂', 'EMI', '艾德烈音樂',
            '摩城唱片', '華納兄弟唱片', '寰宇唱片', '博德曼音樂', 
            '卡拉OK唱片', '百代音樂', '摩登天空', '阿希姆唱片', 
            '米高梅影視音樂', '嘉士伯唱片', '國會音樂', '貝塔斯曼音樂', 
            '伊士曼唱片'
          );
          return $company[rand(0,count($company)-1)];  

    }

    public function generateRandomCity() {
        $city = array(
            ' 洛杉磯',
            '东京',
            '布伯班克',
            '倫敦',
            '台北',
            '紐約',  
            '布伯班克',
            '香港',
            '柏林',
            '東京',
            ' 漢堡',
            '台北',
            '东京',
            '好萊塢',
            '香港',
            '台北',
            ' 漢諾威',
            '羅切斯特'
          );
          return $city[rand(0,count($city)-1)];  

    }

    public function generateRandomStyle() {
        $style = array(
            '流行樂', '搖滾樂', '重金屬', '嘻哈', '電子舞曲',
            '爵士', '鄉村音樂', '藍調', '龐克', '放克',
            '民謠', '古典樂', '另類搖滾', '迪斯可', '朋克', 
            '放克', '英倫搖滾', '實驗音樂'
          );
          return $style[rand(0,count($style)-1)];  

    }


    public function run()
    {
        for ($i=0; $i<25; $i++) {
            $name = $this->generateRandomName();
            $company = $this->generateRandomCompany();
            $city = $this->generateRandomCity();
            $style = $this->generateRandomStyle();
            $random_detetime = Carbon::now()->subMinutes(rand(1,55));

            DB::table('orchestras')->insert([
                'name' => $name,
                'company' => $company,
                'city' => $city,
                'style'=> $style,
                'created_at' => $random_detetime,
                'updated_at' => $random_detetime        
            ]);
        }

    }
}
