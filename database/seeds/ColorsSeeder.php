<?php

use App\Models\Product\Color;
use Illuminate\Database\Seeder;

/**
 * Created by PhpStorm.
 * User: Mahmoud
 * Date: 4/4/2019
 * Time: 10:58 AM
 */
class ColorsSeeder extends Seeder
{

    public function run()
    {

        $data = new Color();
        $data['language_id'] = 1;
        $data['title'] = "Red";
        $data['color'] = "#FC2D5B";
        $data->save();


        $data = new Color();
        $data['language_id'] = 1;
        $data['title'] = "Yellow";
        $data['color'] = "#FFB226";
        $data->save();


        $data = new Color();
        $data['language_id'] = 1;
        $data['title'] = "Blue";
        $data['color'] = "#2042f5";
        $data->save();


        $data = new Color();
        $data['language_id'] = 1;
        $data['title'] = "Black";
        $data['color'] = "#222";
        $data->save();
        

        $data = new Color();
        $data['language_id'] = 1;
        $data['title'] = "White";
        $data['color'] = "#fff";
        $data->save();


    

    }

}
