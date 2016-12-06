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
     * Transform a Collection
     *
     * @return array
     * @author Fred Carneiro
     **/
    public function transformCollectionMap($items)
    {
        return $items->map([$this, 'transform']);
    }    

    /**
     * undocumented function
     *
     * @return void
     * @author 
     **/
    public abstract function transform($item);

	
}