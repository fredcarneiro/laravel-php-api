<?php

use Faker\Factory as Faker;

/**
* 
*/
abstract class ApiTester extends TestCase
{
	
	protected $fake;

	function __construct()
	{
		$this->fake = Faker::create();
	}


    protected function assertObjectHasAttributes()
    {
        $args = func_get_args();

        $object = array_shift($args);

        foreach ($args as $attribute) {
            $this->assertObjectHasAttribute($attribute, $object);
        }
    }

    protected function getStub()
    {
    	throw new BadMethodCallException('Create your own getStub method to declare your fields.');
    }

}