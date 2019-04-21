<?php

use App\Models\Category;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

/**
 * Created by PhpStorm.
 * User: Mahmoud
 * Date: 4/4/2019
 * Time: 10:58 AM
 */
class CategorySeeder extends Seeder
{

    public function run()
    {
        $faker = Faker::create();

        $data = new Category();
        $data['language_id'] = 1;
        $data['name'] = "Men";
        $data['img'] = '1'.'.jpg';
        $data['small_desc'] = $faker->text;
        $data['desc'] = $faker->text;
        $data['slug'] = str_slug("Men");
        $data->save();



        $data = new Category();
        $data['language_id'] = 1;
        $data['name'] = "Womens";
        $data['img'] = '2'.'.jpg';
        $data['small_desc'] = $faker->text;
        $data['desc'] = $faker->text;
        $data['slug'] = str_slug("Womens");
        $data->save();



        $data = new Category();
        $data['language_id'] = 1;
        $data['name'] = "Kids";
        $data['img'] = '3'.'.jpg';
        $data['small_desc'] = $faker->text;
        $data['desc'] = $faker->text;
        $data['slug'] = str_slug("Kids");
        $data->save();



        $data = new Category();
        $data['language_id'] = 1;
        $data['name'] = "Sports";
        $data['img'] = '4'.'.jpg';
        $data['small_desc'] = $faker->text;
        $data['desc'] = $faker->text;
        $data['slug'] = str_slug("Sports");
        $data->save();


        $data = new Category();
        $data['language_id'] = 1;
        $data['name'] = "Accessories";
        $data['img'] = '4'.'.jpg';
        $data['small_desc'] = $faker->text;
        $data['desc'] = $faker->text;
        $data['slug'] = str_slug("Accessories");
        $data->save();


    

    }

}
