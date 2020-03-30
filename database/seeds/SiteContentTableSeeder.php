<?php

use Illuminate\Database\Seeder;

class SiteContentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $site_content = factory(App\SiteContent::class)->create();
    }
}
