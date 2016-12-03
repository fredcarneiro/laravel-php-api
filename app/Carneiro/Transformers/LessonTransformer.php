<?php

namespace App\Carneiro\Transformers;

/**
* 
*/
class LessonTransformer extends Transformer
{

	/**
     * Transformer for Lesson
     *
     * @return array
     * @author Fred Carneiro
     **/
    public function transform($lesson)
    {
        return [
            'title' => $lesson['title'],
            'body' => $lesson['body'],                
            'active' => (boolean) $lesson['some_bool']
        ];
    }
	
}