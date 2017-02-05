<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class OrderDetail extends Pivot
{
    public $incrementing = false;
    public $timestamps = false;
    

    protected $table = 'orderdetails';

    protected $fillable = ['orderNumber','productCode','quantityOrdered','priceEach','orderLineNumber'];
}
