<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\OrderStatus;

use Validator;
use DB;

class PerfomanceProductLineController extends Controller
{
    public function productLinePerformance(Request $request) {

    	$validator = Validator::make($request->all(), [
    		'ID' => 'required|numeric|exists:offices,officeCode',
		]);

		if ($validator->fails())
			return response()->json($validator->errors(), 422);

		$performance = DB::table('offices')
			->join('employees','offices.officeCode','=','employees.officeCode')
			->join('customers','employees.employeeNumber','=','customers.salesRepEmployeeNumber')
			->join('orders','customers.customerNumber','=','orders.customerNumber')
			->join('orderdetails','orders.orderNumber','=','orderdetails.orderNumber')
			->join('products','orderdetails.productCode','=','products.productCode')
			->join('productlines','products.productLine','=','productlines.productLine')
			->where('offices.officeCode','=',$request->ID)
			->where('orders.status', 'Shipped')
			->orderBy('number_of_sales','desc')
			->groupBy('productlines.productLine','productlines.textDescription')
			->select(DB::raw('productlines.productLine, productlines.textDescription, count(orders.orderNumber) as number_of_sales'))
			->get();

		return response()->json($performance);

    }
}
