<?php

use Illuminate\Database\Seeder;
use App\Models\Area\Gov;


class GovSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = new Gov();
        $data['language_id'] = 1;
        $data['name'] = "cairo";
        $data->save();


        $data = new Gov();
        $data['language_id'] = 1;
        $data['name'] = "giza";
        $data->save();


        $data = new Gov();
        $data['language_id'] = 1;
        $data['name'] = "alex";
        $data->save();


        $data = new Gov();
        $data['language_id'] = 1;
        $data['name'] = "kena";
        $data->save();

        $data = new Gov();
        $data['language_id'] = 1;
        $data['name'] = "mansora";
        $data->save();



    }
}
