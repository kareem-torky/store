<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Language;


/**
 * Created by PhpStorm.
 * User: Mahmoud
 * Date: 4/4/2019
 * Time: 10:58 AM
 */
class LanguageSeeder extends Seeder
{

    public function run()
    {
        
        $data = new Language();
        $data['name'] ="English";
        $data['symbole'] = "en";
        $data->save();

        $data = new Language();
        $data['name'] = "العربية";
        $data['symbole'] = "ar";
        $data->save();

    

    }

}
