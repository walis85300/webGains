<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

abstract class OrderStatus {
    const Cancelled  = '    Cancelled'  ;
    const Disputed   =      'Disputed'  ;
    const Resolved   =      'Resolved'  ;
    const OnHold     =      'On Hold'   ;
    const InProccess =      'In Process' ;
    const Shipped    =      'Shipped'    ;
}

class Order extends Model
{
    public $incrementing = false;
    public $timestamps = false;
    

    protected $table = 'orders';

    protected $primaryKey = 'orderNumber';

    protected $visible = ['orderNumber', 'orderDate','requiredDate','shippedDate','status','comments','customerNumber', 'products'];

    protected $fillable = ['orderNumber', 'orderDate','requiredDate','shippedDate','status','comments','customerNumber'];

    public function customer() {
    	return $this->belongsTo('App\Customer','customerNumber','customerNumber');
    }

    public function products() {
    	return $this->belongsToMany('App\Product','orderdetails','orderNumber','productCode')->using('App\OrderDetail')
            ->withPivot('quantityOrdered','priceEach');
    }
}
