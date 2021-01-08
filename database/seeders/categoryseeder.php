<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class categoryseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $categories=['Giyim','Elektronik','Spor'];
        foreach ($categories as $category){
            DB::table('categories')->insert([
                'name'=>$category,
                'slug'=>$category
            ]);
        }

    }
}
