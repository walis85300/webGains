<?php

namespace App\Http\Transformers;

use League\Fractal;

use App\ProductLine;

class ProductLineItemTransformer extends Fractal\TransformerAbstract {

	public function transform( ProductLine $productLine ) {
		return [
			'productLine' => $productLine->productLine,
			'textDescription' => $productLine->textDescription,
			'htmlDescription' => $productLine->htmlDescription,
			'image' => $productLine->image,
		];
	}

}