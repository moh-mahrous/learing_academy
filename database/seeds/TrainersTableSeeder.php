<?php

use Illuminate\Database\Seeder;

class TrainersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $trainers = factory(App\Trainer::class, 10)->create();
    }
}
