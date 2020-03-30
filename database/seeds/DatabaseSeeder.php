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
        // $this->call(UsersTableSeeder::class);
        $this->call([CatsTableSeeder::class,
                    TrainersTableSeeder::class,
                    CoursesTableSeeder::class,
                    StudentsTableSeeder::class,
                    CoursesStudentsTableSeeder::class,
                    TestsTableSeeder::class,
                    SettingSeeder::class,
                    SiteContentTableSeeder::class,
        ]);
    }
}
