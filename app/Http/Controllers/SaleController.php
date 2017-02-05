<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

use App\Http\Requests\CreateSaleRequest;

use App\Customer;
use App\Order;
use App\Product;

use App\OrderStatus;

use DB;

class SaleController extends Controller
{

	protected $productsInCache;

	public function __construct() {

		$this->productsInCache = Cache::get('products', function(){
			return DB::table('products')->get();
		});

	}

    public function store(CreateSaleRequest $request) {

    	$customer = Customer::find($request->customer);

    	$newOrder = $customer->orders()->create([
    		// It could be improved using auto-incrementing in
    		// the DB
    		'orderNumber' => Order::count() + 10100,
    		'orderDate' => \Carbon\Carbon::today()->toDateString(),
    		// It should be sent in the request
    		// I'll asume the required date is 15 days in the future
    		'requiredDate' => \Carbon\Carbon::today()->addDays(15)->toDateString(),
    		// The initial status is In Proccess
    		'status' => OrderStatus::InProccess,
		]);

		foreach ($request->products as $key => $value) {
			$newOrder->products()->attach($value['ID'], [
				'quantityOrdered' => $value['quantity'],
				// It should be sent in the request
				// I'll asume the MSRP at product table
				'priceEach' => $this->productsInCache
					->where('productCode', $value['ID'])
					->first()->MSRP,
				'orderLineNumber' => $key + 1
			]);
		}

		$newOrder->load('products');

		$orderPrice = $newOrder->products->reduce(function($carry, $item) {
				return ($carry + ($item->pivot->quantityOrdered * $item->pivot->priceEach));
			}, 0);

		if ($orderPrice > $customer->creditLimit)
			$newOrder->status = OrderStatus::OnHold;

		$responseObject = [
			'ID' => $newOrder->orderNumber,
			'date' => $newOrder->orderDate,
			'status' => $newOrder->status,
			'total' => $orderPrice
		];

    	return response()->json($responseObject, 200);
    }
}
