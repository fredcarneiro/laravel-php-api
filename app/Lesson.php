<?php

Namespace App;

/**
* 
*/
class Lesson extends \Eloquent
{
	protected $fillable = ['title', 'body', 'some_bool'];	

	/**
	 * Return all tags from a lesson
	 *
	 *
	 * @param 
	 **/
	public function tags()
	{
		return $this->belongsToMany('App\Tag')->getResults();
	}
}