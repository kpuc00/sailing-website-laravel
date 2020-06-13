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
        $this->call(UserTableSeeder::class);
        $this->call(CoachesTableSeeder::class);
        $this->call(CoursesTableSeeder::class);
        $this->call(RegattasTableSeeder::class);
        $this->call(CompetitorsTableSeeder::class);
        $this->call(ArticlesTableSeeder::class);
        $this->call(AnnouncementsTableSeeder::class);
    }
}
