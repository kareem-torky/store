<?php

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


/**
 * Created by PhpStorm.
 * User: Mahmoud
 * Date: 4/4/2019
 * Time: 10:58 AM
 */
class AdminSeeder extends Seeder
{

    public function run()
    {
        
        $faker = Faker::create();

        $data = new Admin();
        $data['name'] = $faker->name;
        $data['language_id'] = 1;
        $data['email'] = "adminen@admin.com";
        $data['password'] = bcrypt('123456');
        $data->save();

        $data = new Admin();
        $data['name'] = $faker->name;
        $data['language_id'] = 2;
        $data['email'] = "admin@admin.com";
        $data['password'] = bcrypt('123456');
        $data->save();

      


    

    }

}
