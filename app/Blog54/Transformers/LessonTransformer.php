<?php

namespace App\Blog54\Transformers;

class LessonTransformer extends Transformer{

    public function transform($lesson){

		return [
			'title' => $lesson['title'],
			'body' => $lesson['body'],
			'is_displayed' => (boolean)$lesson['is_displayed']
		];

    }

}
?>