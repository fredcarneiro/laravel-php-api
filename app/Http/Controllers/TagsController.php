<?php

namespace App\Http\Controllers;

Use App\Carneiro\Transformers\TagTransformer;
Use App\Tag;
Use App\Lesson;


class TagsController extends ApiController
{
    /*
        @var Carneiro\Transformers\TagTransformer
    */
    protected $tagTransformer;

    function __construct(TagTransformer $tagTransformer)
    {
        $this->tagTransformer = $tagTransformer;
    }
    
    /**
     * Return all tags
     *
     * @param null $lessonId
     **/
    public function index($lessonId = null)
    {

        if (is_null(Lesson::find($lessonId)))
        {
            return $this->respondNotFound('Resource not found');
        }
        
        $tags = $this->getTags($lessonId);

        return $this->respond([
            'data' => $this->tagTransformer->transformCollection($tags->toArray())
        ]);
    }

    /**
     * Return tags from lessons
     *
     *
     * @param null $lessonId
     **/
    public function getTags($lessonId = null)
    {
        return $lessonId ? Lesson::find($lessonId)->tags() : Tag::all();
    }
}