<?php

namespace App\Traits;

trait ResponseValidatorErrors {

	public function response(array $errors) {
        return response()->json(compact('errors'), 422);
    }

}