<?php

namespace App\Carneiro\Transformers;

/**
* 
*/
abstract class Transformer
{   

	 /**
     * Transform a Collection
     *
     * @return array
     * @author Fred Carneiro
     **/
    public function transformCollection(array $items)
    {
        return array_map([$this, 'transform'], $items);
    }

    /**
     * undocumented function
     *
     * @return void
     * @author 
     **/
    public abstract function transform($item);

	
}