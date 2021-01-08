<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Support\Str;
class productseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker=Faker::create();
        $width=200;
        $height=200;
        for($i=0;$i<4;$i++){

            $title=$faker->sentence(6);


            DB::table('products')->insert([
               'categoryID'=>rand(1,3),
                'title'=>$title,
                'content'=>$faker->text,
                'price'=>rand(10,100),
                'image'=>$faker->imageUrl($width,$height,'cats',true,'urunler'),
                'slug'=>str::slug($title),
                'userID'=>rand(1,7),
                'created_at'=>$faker->dateTime(now()),
                'updated_at'=>now()
            ]);

        }
    }
}
