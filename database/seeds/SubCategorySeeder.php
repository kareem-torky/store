<?php

use App\Models\SubCategory;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

/**
 * Created by PhpStorm.
 * User: Mahmoud
 * Date: 4/4/2019
 * Time: 10:58 AM
 */
class SubCategorySeeder extends Seeder
{

    public function run()
    {
        $faker = Faker::create();

        $data = new SubCategory();
        $data['category_id'] = 1;
        $data['name'] = "T-Shirt";
        $data['img'] = '1'.'.jpg';
        $data['small_desc'] = $faker->text;
        $data['desc'] = $faker->text;$data['language_id'] = 1;
        $data['slug'] = str_slug("T-Shirt");
        $data->save();

        $data = new SubCategory();
        $data['category_id'] = 1;
        $data['name'] = "Shoes";
        $data['img'] = '2'.'.jpg';
        $data['small_desc'] = $faker->text;
        $data['desc'] = $faker->text;$data['language_id'] = 1;
        $data['slug'] = str_slug("Shoes");
        $data->save();

        $data = new SubCategory();
        $data['category_id'] = 1;
        $data['name'] = "Polo-Shirts";
        $data['img'] = '3'.'.jpg';
        $data['small_desc'] = $faker->text;
        $data['desc'] = $faker->text;$data['language_id'] = 1;
        $data['slug'] = str_slug("Polo-Shirts");
        $data->save();

        $data = new SubCategory();
        $data['category_id'] = 1;
        $data['name'] = "Paints";
        $data['img'] = '4'.'.jpg';
        $data['small_desc'] = $faker->text;
        $data['desc'] = $faker->text;$data['language_id'] = 1;
        $data['slug'] = str_slug("Paints");
        $data->save();

        $data = new SubCategory();
        $data['category_id'] = 1;
        $data['name'] = "Jeans";
        $data['img'] = '5'.'.jpg';
        $data['small_desc'] = $faker->text;
        $data['desc'] = $faker->text;$data['language_id'] = 1;
        $data['slug'] = str_slug("Jeans");
        $data->save();


        // ///////////////////////////
        // //////////////////////////
        // /////////////////////////

        $data = new SubCategory();
        $data['category_id'] = 2;
        $data['name'] = "Bags";
        $data['img'] = '1'.'.jpg';
        $data['small_desc'] = $faker->text;
        $data['desc'] = $faker->text;$data['language_id'] = 1;
        $data['slug'] = str_slug("Bags");
        $data->save();

        $data = new SubCategory();
        $data['category_id'] = 2;
        $data['name'] = "Shoes";
        $data['img'] = '2'.'.jpg';
        $data['small_desc'] = $faker->text;
        $data['desc'] = $faker->text;$data['language_id'] = 1;
        $data['slug'] = str_slug("Shoes-d");
        $data->save();

        $data = new SubCategory();
        $data['category_id'] = 2;
        $data['name'] = "Skirt";
        $data['img'] = '3'.'.jpg';
        $data['small_desc'] = $faker->text;
        $data['desc'] = $faker->text;$data['language_id'] = 1;
        $data['slug'] = str_slug("Skirt");
        $data->save();

        $data = new SubCategory();
        $data['category_id'] = 2;
        $data['name'] = "Coats";
        $data['img'] = '4'.'.jpg';
        $data['small_desc'] = $faker->text;
        $data['desc'] = $faker->text;$data['language_id'] = 1;
        $data['slug'] = str_slug("Coats");
        $data->save();

        $data = new SubCategory();
        $data['category_id'] = 2;
        $data['name'] = "Bags";
        $data['img'] = '5'.'.jpg';
        $data['small_desc'] = $faker->text;
        $data['desc'] = $faker->text;$data['language_id'] = 1;
        $data['slug'] = str_slug("Bags-d");
        $data->save();


        // ///////////////////////////
        // //////////////////////////
        // /////////////////////////

        $data = new SubCategory();
        $data['category_id'] = 3;
        $data['name'] = "Bags";
        $data['img'] = '1'.'.jpg';
        $data['small_desc'] = $faker->text;
        $data['desc'] = $faker->text;$data['language_id'] = 1;
        $data['slug'] = str_slug("Bags-e");
        $data->save();

        $data = new SubCategory();
        $data['category_id'] = 3;
        $data['name'] = "Shoes";
        $data['img'] = '2'.'.jpg';
        $data['small_desc'] = $faker->text;
        $data['desc'] = $faker->text;$data['language_id'] = 1;
        $data['slug'] = str_slug("Shoes-dd");
        $data->save();

        $data = new SubCategory();
        $data['category_id'] = 3;
        $data['name'] = "Shirts";
        $data['img'] = '3'.'.jpg';
        $data['small_desc'] = $faker->text;
        $data['desc'] = $faker->text;$data['language_id'] = 1;
        $data['slug'] = str_slug("Shirts-a");
        $data->save();

        $data = new SubCategory();
        $data['category_id'] = 3;
        $data['name'] = "Paints";
        $data['img'] = '3'.'.jpg';
        $data['small_desc'] = $faker->text;
        $data['desc'] = $faker->text;$data['language_id'] = 1; 
        $data['slug'] = str_slug("Paints-w");
        $data->save();

        $data = new SubCategory();
        $data['category_id'] = 3;
        $data['name'] = "Jeans";
        $data['img'] = '3'.'.jpg';
        $data['small_desc'] = $faker->text;
        $data['desc'] = $faker->text;$data['language_id'] = 1;
        $data['slug'] = str_slug("Jeans-a");
        $data->save();



        // ///////////////////////////
        // //////////////////////////
        // /////////////////////////

        $data = new SubCategory();
        $data['category_id'] = 4;
        $data['name'] = "Clothing";
        $data['img'] = '1'.'.jpg';
        $data['small_desc'] = $faker->text;
        $data['desc'] = $faker->text;$data['language_id'] = 1;
        $data['slug'] = str_slug("Clothing");
        $data->save();

        $data = new SubCategory();
        $data['category_id'] = 4;
        $data['name'] = "Shoes";
        $data['img'] = '2'.'.jpg';
        $data['small_desc'] = $faker->text;
        $data['desc'] = $faker->text;$data['language_id'] = 1;
        $data['slug'] = str_slug("Shoes-v");
        $data->save();

        $data = new SubCategory();
        $data['category_id'] = 4;
        $data['name'] = "Bags";
        $data['img'] = '3'.'.jpg';
        $data['small_desc'] = $faker->text;
        $data['desc'] = $faker->text;$data['language_id'] = 1;
        $data['slug'] = str_slug("Bags-s");
        $data->save();

        $data = new SubCategory();
        $data['category_id'] = 4;
        $data['name'] = "Vintage";
        $data['img'] = '3'.'.jpg';
        $data['small_desc'] = $faker->text;
        $data['desc'] = $faker->text;$data['language_id'] = 1;
        $data['slug'] = str_slug("Vintage");
        $data->save();

        $data = new SubCategory();
        $data['category_id'] = 4;
        $data['name'] = "Activeware";
        $data['img'] = '3'.'.jpg';
        $data['small_desc'] = $faker->text;
        $data['desc'] = $faker->text;$data['language_id'] = 1;
        $data['slug'] = str_slug("Activeware");
        $data->save();





        // ///////////////////////////
        // //////////////////////////
        // /////////////////////////

        $data = new SubCategory();
        $data['category_id'] = 5;
        $data['name'] = "Hats";
        $data['img'] = '1'.'.jpg';
        $data['small_desc'] = $faker->text;
        $data['desc'] = $faker->text;$data['language_id'] = 1;
        $data['slug'] = str_slug("Hats");
        $data->save();

        $data = new SubCategory();
        $data['category_id'] = 5;
        $data['name'] = "Wallet";
        $data['img'] = '2'.'.jpg';
        $data['small_desc'] = $faker->text;
        $data['desc'] = $faker->text;$data['language_id'] = 1;
        $data['slug'] = str_slug("Wallet");
        $data->save();

        $data = new SubCategory();
        $data['category_id'] = 5;
        $data['name'] = "Bags";
        $data['img'] = '3'.'.jpg';
        $data['small_desc'] = $faker->text;
        $data['desc'] = $faker->text;$data['language_id'] = 1;
        $data['slug'] = str_slug("Bags-yt");
        $data->save();

        $data = new SubCategory();
        $data['category_id'] = 5;
        $data['name'] = "Belts";
        $data['img'] = '3'.'.jpg';
        $data['small_desc'] = $faker->text;
        $data['desc'] = $faker->text;$data['language_id'] = 1;
        $data['slug'] = str_slug("Belts");
        $data->save();

        $data = new SubCategory();
        $data['category_id'] = 5;
        $data['name'] = "Braces";
        $data['img'] = '3'.'.jpg';
        $data['small_desc'] = $faker->text;
        $data['desc'] = $faker->text;$data['language_id'] = 1;
        $data['slug'] = str_slug("Braces");
        $data->save();







    }

}
