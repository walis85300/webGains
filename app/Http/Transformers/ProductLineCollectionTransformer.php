<?php

namespace App\Http\Transformers;

use League\Fractal;

use App\ProductLine;

class ProductLineCollectionTransformer extends Fractal\TransformerAbstract {

	public function transform( ProductLine $productLine ) {
		return [
			'productLine' => $productLine->productLine,
			'textDescription' => $productLine->textDescription,
			'url' => $productLine->url
		];
	}

}