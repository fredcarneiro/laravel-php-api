<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
Use App\Tag;
Use App\Lesson;


use Faker\Factory as Faker;

class LessonTagTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

		$lessonsIds = Lesson::pluck('id')->all();
		$tagIds = Tag::pluck('id')->all();
		
		foreach(range(1,30) as $index)
		{
			DB::table('lesson_tag')->insert([
				'lesson_id' => $faker->randomElement($lessonsIds),
				'tag_id' => $faker->randomElement($tagIds)
			]);
		}


    }
}
