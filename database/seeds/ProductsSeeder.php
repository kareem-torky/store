<?php

use App\Models\SubCategory;
use App\Models\Product;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

/**
 * Created by PhpStorm.
 * User: Mahmoud
 * Date: 4/4/2019
 * Time: 10:58 AM
 */
class ProductsSeeder extends Seeder
{

    public function run()
    {
        $faker = Faker::create();
        $images = array("1.jpg","2.jpg","3.jpg");
        $sizes = array("1","2","3");
        $colors = array("1","2","3");
        for($i=1; $i<=25; $i++)
        {
            $data = new Product();
            $data['category_id']        = 1;
            $data['language_id']        = 1;
            $data['sub_category_id']    = rand(1,5);
            $data['name']               = $faker->name;
            $data['code']               = uniqid();
            $data['img']                = rand(1,5).'.jpg';
            $data['price']              = rand(101,999);
            $data['show_in_homePage']   = 'yes';
            $data['show_in_footer']     = 'yes';
            $data['featured']           = 'yes';
            $data['small_desc']         = $faker->text;
            $data['desc']               = $faker->text;
            $data['slug']               = str_slug($faker->name).'1';
            $data['status']             = 'yes';
            $data['images']             =  json_encode($images);
            $data['sizes']              =  json_encode($sizes);
            $data['colors']             =  json_encode($colors);
            $data->save();
        }


        for($i=1; $i<=25; $i++)
        {
            $data = new Product();
            $data['category_id']        = 2;
            $data['language_id']        = 1;
            $data['sub_category_id']    = rand(6,10);
            $data['name']               = $faker->name;
            $data['code']               = uniqid();
            $data['img']                = rand(1,5).'.jpg';
            $data['price']              = rand(101,999);
            $data['show_in_homePage']   = 'yes';
            $data['show_in_footer']     = 'yes';
            $data['featured']           = 'yes';
            $data['small_desc']         = $faker->text;
            $data['desc']               = $faker->text;
            $data['slug']               = str_slug($faker->name).'2';
            $data['status']             = 'yes';
            $data['images']             =  json_encode($images);
            $data['sizes']              =  json_encode($sizes);
            $data['colors']             =  json_encode($colors);
            $data->save();
        }


        for($i=1; $i<=25; $i++)
        {
            $data = new Product();
            $data['category_id']        = 3;
            $data['language_id']        = 1;
            $data['sub_category_id']    = rand(11,15);
            $data['name']               = $faker->name;
            $data['code']               = uniqid();
            $data['img']                = rand(1,5).'.jpg';
            $data['price']              = rand(101,999);
            $data['show_in_homePage']   = 'yes';
            $data['show_in_footer']     = 'yes';
            $data['featured']           = 'yes';
            $data['small_desc']         = $faker->text;
            $data['desc']               = $faker->text;
            $data['slug']               = str_slug($faker->name).'3';
            $data['status']             = 'yes';
            $data['images']             =  json_encode($images);
            $data['sizes']              =  json_encode($sizes);
            $data['colors']             =  json_encode($colors);
            $data->save();
        }






        for($i=1; $i<=25; $i++)
        {
            $data = new Product();
            $data['category_id']        = 4;
            $data['language_id']        = 1;
            $data['sub_category_id']    = rand(16,20);
            $data['name']               = $faker->name;
            $data['code']               = uniqid();
            $data['img']                = rand(1,5).'.jpg';
            $data['price']              = rand(101,999);
            $data['show_in_homePage']   = 'yes';
            $data['show_in_footer']     = 'yes';
            $data['featured']           = 'yes';
            $data['small_desc']         = $faker->text;
            $data['desc']               = $faker->text;
            $data['slug']               = str_slug($faker->name).'4';
            $data['status']             = 'yes';
            $data['images']             =  json_encode($images);
            $data['sizes']              =  json_encode($sizes);
            $data['colors']             =  json_encode($colors);
            $data->save();
        }



        for($i=1; $i<=25; $i++)
        {
            $data = new Product();
            $data['category_id']        = 5;
            $data['language_id']        = 1;
            $data['sub_category_id']    = rand(21,25);
            $data['name']               = $faker->name;
            $data['code']               = uniqid();
            $data['img']                = rand(1,5).'.jpg';
            $data['price']              = rand(101,999);
            $data['show_in_homePage']   = 'yes';
            $data['show_in_footer']     = 'yes';
            $data['featured']           = 'yes';
            $data['small_desc']         = $faker->text;
            $data['desc']               = $faker->text;
            $data['slug']               = str_slug($faker->name).'5';
            $data['status']             = 'yes';
            $data['images']             =  json_encode($images);
            $data['sizes']              =  json_encode($sizes);
            $data['colors']             =  json_encode($colors);
            $data->save();
        }
        






    }

}
