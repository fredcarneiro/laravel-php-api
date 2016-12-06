<?php

trait Factory
{
	
	protected $times = 1;
	

	protected function make($type, array $fields = [])
    {
    	
    	$type = '\\App\\' . $type;

    	while($this->times--)
    	{
    		$stub = array_merge($this->getStub(), $fields);
    		$type::create($stub);
    	}

    }

	protected function times($count)
    {
        $this->times = $count;
        return $this;
    }    
}