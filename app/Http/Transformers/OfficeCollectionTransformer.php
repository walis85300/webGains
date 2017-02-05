<?php

namespace App\Http\Transformers;

use League\Fractal;

use App\Office;

class OfficeCollectionTransformer extends Fractal\TransformerAbstract {

	public function transform( Office $office ) {
		return [
			'officeCode' => $office->officeCode,
			'city' => $office->city,
			'phone' => $office->phone,
			'url' => $office->url,
		];
	}

}