<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'id' => 1,
                'name' => '特撮',
            ],
            [
                'id' => 2, 
                'name' => 'マンガ・アニメ',  
            ],
            [
                'id' => 3, 
                'name' => 'スポーツ選手',  
            ],
            [
                'id' => 4, 
                'name' => '歌手',  
            ],
            [
                'id' => 5, 
                'name' => '俳優・女優',  
            ],
            [
                'id' => 6, 
                'name' => '偉人',  
            ],
            [
                'id' => 7, 
                'name' => '学者',
            ],
            [
                'id' => 8, 
                'name' => 'その他',  
            ],
        ]);
    }
}
