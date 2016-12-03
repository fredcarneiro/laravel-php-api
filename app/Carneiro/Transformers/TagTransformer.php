<?php

Namespace App\Carneiro\Transformers;

class TagTransformer extends Transformer
{
    /**
     * Transformer for Tag
     *
     * @return array
     * @author Fred Carneiro
     **/
    public function transform($tag)
    {
        return [
            'name' => $tag['name']          
        ];
    }
}