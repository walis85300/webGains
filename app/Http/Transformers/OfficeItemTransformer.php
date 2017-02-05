<?php

namespace App\Http\Transformers;

use League\Fractal;

use App\Office;

class OfficeItemTransformer extends Fractal\TransformerAbstract {

	public function transform( Office $office ) {
		return $office->toArray();
	}

}