<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(LanguageSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(SiteContentSeeder::class);
        $this->call(SettingSeeder::class);

        $this->call(CategorySeeder::class);
        $this->call(SubCategorySeeder::class);
        $this->call(ColorsSeeder::class);
        $this->call(SizesSeeder::class);
        $this->call(BrandsSeeder::class);
        $this->call(ProductsSeeder::class);
        $this->call(BlogSeeder::class);
        $this->call(GovSeeder::class);
        $this->call(OrderSeeder::class);
        $this->call(OrderContentSeeder::class);


    }
}
