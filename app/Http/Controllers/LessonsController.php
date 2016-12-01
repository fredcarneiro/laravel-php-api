<?php

namespace App\Http\Controllers;

Use App\Carneiro\Transformers\LessonTransformer;
use Illuminate\Http\Request;
Use App\Lesson;
Use Response;

class LessonsController extends ApiController
{


    /*
        @var Carneiro\Transformers\LessonTransformer
    */
    protected $lessonTransformer;

    function __construct(LessonTransformer $lessonTransformer)
    {
        $this->lessonTransformer = $lessonTransformer;
        $this->middleware('auth.basic', ['only' => 'store']);
    }

    /**
     * return all Lessons
     *
     * @return array
     * @author Fred Carneiro
     **/
    public function index()
    {
    	//return Lesson::all();

        $lessons = Lesson::all();

        return $this->respond([
            'data' => $this->lessonTransformer->transformCollection($lessons->toArray())
        ]);

    }

    /**
     * Return a specific Lesson
     *
     * @return array
     * @author Fred Carneiro
     **/
    public function show($id)
    {
        $lesson = Lesson::find($id);

        if (! $lesson) 
        {            
            return $this->respondNotFound('Lesson does not exist');
        }

        return $this->respond([
            'data' => $this->lessonTransformer->transform($lesson)
        ]);
    }

    /**
     * Store to database
     *
     *
     * @param Request $request
     **/
    public function store(Request $request)
    {
        if(! $request->input('title') or ! $request->input('body'))
        {
            return $this->respondUnprocessableEntity('Parameters Failed validation for a lesson.');
        } 

        Lesson::create($request->all());

        return $this->respondCreated('Lesson successfully created');

    }

}
