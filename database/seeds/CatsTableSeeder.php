<?php

use Illuminate\Database\Seeder;
use App\Cat;

class CatsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cat::create(['name' => 'programing']);
        Cat::create(['name' => 'medical']);
        Cat::create(['name' => 'english']);
    }
}
