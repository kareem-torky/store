<?php

use App\Models\Brand;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


/**
 * Created by PhpStorm.
 * User: Mahmoud
 * Date: 4/4/2019
 * Time: 10:58 AM
 */
class BrandsSeeder extends Seeder
{

    public function run()
    {
        
        $faker = Faker::create();

        $data = new Brand();
        $data['name'] = $faker->name;
        $data['language_id'] = 1;
        $data['img'] = '1'.'.jpg';'.png';
        $data->save();

        $data = new Brand();
        $data['name'] = $faker->name;
        $data['language_id'] = 1;
        $data['img'] = '1'.'.jpg';'.png';
        $data->save();

        $data = new Brand();
        $data['name'] = $faker->name;
        $data['language_id'] = 1;
        $data['img'] = '1'.'.jpg';'.png';
        $data->save();

        $data = new Brand();
        $data['name'] = $faker->name;
        $data['language_id'] = 1;
        $data['img'] = '1'.'.jpg';'.png';
        $data->save();

        $data = new Brand();
        $data['name'] = $faker->name;
        $data['language_id'] = 1;
        $data['img'] = '1'.'.jpg';'.png';
        $data->save();

        $data = new Brand();
        $data['name'] = $faker->name;
        $data['language_id'] = 1;
        $data['img'] = '1'.'.jpg';'.png';
        $data->save();

        $data = new Brand();
        $data['name'] = $faker->name;
        $data['language_id'] = 1;
        $data['img'] = '1'.'.jpg';'.png';
        $data->save();

        $data = new Brand();
        $data['name'] = $faker->name;
        $data['language_id'] = 1;
        $data['img'] = '1'.'.jpg';'.png';
        $data->save();

        $data = new Brand();
        $data['name'] = $faker->name;
        $data['language_id'] = 1;
        $data['img'] = '1'.'.jpg';'.png';
        $data->save();

        $data = new Brand();
        $data['name'] = $faker->name;
        $data['language_id'] = 1;
        $data['img'] = '1'.'.jpg';'.png';
        $data->save();


    

    }

}
