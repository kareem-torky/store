<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Setting;


/**
 * Created by PhpStorm.
 * User: Mahmoud
 * Date: 4/4/2019
 * Time: 10:58 AM
 */
class SettingSeeder extends Seeder
{

    public function run()
    {
        
        $data = new Setting();
        $data['language_id'] = 1;
        $data->save();

        $data = new Setting();
        $data['language_id'] = 2;
        $data->save();

    

    }

}
