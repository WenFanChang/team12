<?php

namespace Database\Seeders;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MembersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    

    public function generateRandomPosition() {
        $position = ['主唱','舞者','吉他手','鼓手','鍵盤手','貝斯手','領唱','和聲','領舞','主舞','副唱','副Rapper','主Rapper'];
        return $position[rand(0, count($position)-1)];

    }

    public function generateRandomNationality(){
        $nationality = array(
            '中國', '美國', '日本', '德國', '英國', '法國', '義大利', '俄羅斯', '加拿大', 
            '南韓', '澳洲', '越南', '亞美尼亞', '紐西蘭', '瑞士', '馬來西亞'
        );
        return $nationality[rand(0,count($nationality)-1)];   
    }
    
    public function run(){
        $firstNames = ['John', 'Mary', 'Tom', 'Michael', 'David', 'Michael'];
        $lastNames = ['Smith', 'Johnson', 'Williams', 'Lee', 'Beckham', 'Jordan'];
        for ($i=0; $i<500; $i++) {
            $name = $firstNames[array_rand($firstNames)] . '  ' . $lastNames[array_rand($lastNames)];
            $position = $this->generateRandomPosition();
            $nationality = $this->generateRandomNationality();
            $random_detetime = Carbon::now()->subMinutes(rand(1,55));

            DB::table('members')->insert([
                'name' =>$name,
                'oid' => rand(1,25),
                'position' => $position,
                'height' => rand(165,220),
                'weight' => rand(40,90),
                'year' => rand(16,30),
                'age' => rand(5,20),
                'nationality' => $nationality,
                'created_at' => $random_detetime,
                'updated_at' => $random_detetime        
            ]);
        }
       
    }
}
