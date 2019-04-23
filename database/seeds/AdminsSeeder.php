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
        
        // $faker = Faker::create();

        $data = new Admin();
        $data['name'] = 'kareem torky';
        $data['language_id'] = 1;
        $data['email'] = "kareem@admin.com";
        $data['password'] = bcrypt('123456');
        $data->save();

        $data = new Admin();
        $data['name'] = 'mostafa mahfouz';
        $data['language_id'] = 1;
        $data['email'] = "mostafa@admin.com";
        $data['password'] = bcrypt('123456');
        $data->save();

        $data = new Admin();
        $data['name'] = 'arabic admin';
        $data['language_id'] = 2;
        $data['email'] = "arabic@admin.com";
        $data['password'] = bcrypt('123456');
        $data->save();

      


    

    }

}
