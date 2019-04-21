<?php

use App\Models\Blog;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

/**
 * Created by PhpStorm.
 * User: Mahmoud
 * Date: 4/4/2019
 * Time: 10:58 AM
 */
class BlogSeeder extends Seeder
{

    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) 
        {

            $data['name'] = $faker->name;
            $data['language_id'] = rand(1, 2);
            $data['category_id'] = rand(1, 5);
            $data['img'] = rand(1,5).'.jpg';
            $data['small_description'] = $faker->text;
            $data['description'] = $faker->text;
            $data['status'] = 'yes';
            $data['slug'] = str_slug($faker->name);
            Blog::create($data);


        }
    }

}
