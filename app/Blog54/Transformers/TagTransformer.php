<?php

namespace App\Blog54\Transformers;

class TagTransformer extends Transformer{

    public function transform($tag){

		return [
			'id' => $tag['tag_id'],
			'name' => $tag['tag_name']
		];

    }

}
?>