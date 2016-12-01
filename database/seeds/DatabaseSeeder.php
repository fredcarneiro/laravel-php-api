<?php

use Illuminate\Database\Seeder;
use App\Lesson;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	App\Lesson::truncate();

        // $this->call(UsersTableSeeder::class);
        $this->call(LessonsTableSeeder::class);
    }
}
