<?php

use App\Models\Product\Size;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


/**
 * Created by PhpStorm.
 * User: Mahmoud
 * Date: 4/4/2019
 * Time: 10:58 AM
 */
class SizesSeeder extends Seeder
{

    public function run()
    {
        $faker = Faker::create();



        $data = new Size();
        $data['language_id'] = 1;
        $data['title'] = "Red";
        $data['desc'] = $faker->text;
        $data->save();


        $data = new Size();
        $data['language_id'] = 1;
        $data['title'] = "Yellow";
        $data['desc'] = $faker->text;
        $data->save();


        $data = new Size();
        $data['language_id'] = 1;
        $data['title'] = "Blue";
        $data['desc'] = $faker->text;
        $data->save();


        $data = new Size();
        $data['language_id'] = 1;
        $data['title'] = "Black";
        $data['desc'] = $faker->text;
        $data->save();
        

        $data = new Size();
        $data['language_id'] = 1;
        $data['title'] = "White";
        $data['desc'] = $faker->text;
        $data->save();


    

    }

}
