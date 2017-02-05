<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class OfficeModuleTest extends TestCase
{
    public function testGetOffices() {
    	$response = $this->json('GET','/api/offices');

    	$response
    		->assertStatus(200)
    		->assertJsonStructure([
    			'data'=> ['*' => [
						'officeCode','city','phone','url'
    				]
    			],
    			'meta' => ['pagination' => [
    					'total', 'count', 'per_page', 'current_page',
    					'total_pages','links'
    				]
				]
				
			]);
    		;
    }

    public function testCreateOffice() {
    	$faker = \Faker\Factory::create();
    	$arrayRequest = [
    		'officeCode' => 8,
    		'city' => $faker->city,
    		'phone' => $faker->phoneNumber,
    		'addressLine1' => $faker->streetName,
    		'addressLine2' => $faker->streetName,
    		'state' => $faker->state,
    		'country' => $faker->country,
    		'postalCode' => $faker->postcode,
    		'territory' => $faker->stateAbbr
		];
    	$response = $this->json('POST', '/api/offices', $arrayRequest);

		$response
			->assertStatus(201)
			->assertJson([
				'ok' => 'created'
			]);
    }

    public function testDeleteOffice() {
    	$response = $this->json('DELETE', '/api/offices/8');

    	$response
    		->assertStatus(200);
    }

}
