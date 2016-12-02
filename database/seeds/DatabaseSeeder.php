<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{

    private $tables = ['lessons', 'tags', 'lesson_tag'];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Eloquent::unguard();        

        // $this->call(UsersTableSeeder::class);
        $this->call(LessonsTableSeeder::class);
        $this->call(TagsTableSeeder::class);
        $this->call(LessonTagTableSeeder::class);
    }

    /**
     * Clean Database
     *
     **/
    private function cleanDatabase()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        
        foreach($this->tables as $tableName)
        {
            DB::table($tableName)->truncate();
        }
        
    	DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
