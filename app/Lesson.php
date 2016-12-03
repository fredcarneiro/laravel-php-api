<?php

Namespace App;

/**
* 
*/
class Lesson extends \Eloquent
{
	protected $fillable = ['title', 'body'];	

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