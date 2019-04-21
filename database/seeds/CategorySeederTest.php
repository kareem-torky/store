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

        foreach (range(1, 10) as $index) {
            $data['name'] = $faker->name;
            $data['language_id'] = rand(1, 2);
            $data['country_id'] = rand(1, 10);
            $data['img'] = $faker->imageUrl(500,500,'nature');
            $data['small_desc'] = $faker->text;
            $data['desc'] = $faker->text;
            $data['slug'] = str_slug($data['name']);

            Category::create($data);
        }
    }

}
