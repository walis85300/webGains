<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $incrementing = false;
    public $timestamps = false;
    

    protected $table = 'products';

    protected $primaryKey = 'productCode';

    protected $visible = ['productCode','productName','productLine','productScale','productVendor','productDescription','quantityInStock','buyPrice','MSRP'];

    public function productLine() {
    	return $this->belongsTo('App\ProductLine','productLine','productLine');
    }

    public function orders() {
    	return $this->belongsToMany('App\Order','orderdetails','productCode','orderCode')->using('App\OrderDetail');
    }
}
