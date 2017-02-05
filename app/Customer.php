<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public $incrementing = false;
    public $timestamps = false;


    protected $table = 'customers';
    protected $primaryKey = 'customerNumber';

    protected $fillable = ['customerNumber','customerName','contactLastName','contactFirstName','phone','addressLine1','addressLine2','city','state','postalCode','country','salesRepEmployeeNumber','creditLimit'];

    public function saleRepresentant() {
    	return $this->belongsTo('App\Employee','salesRepEmployeeNumber','employeeNumber');
    }

    public function orders() {
    	return $this->hasMany('App\Order','customerNumber','customerNumber');
    }

    public function payments() {
        return $this->hasMany('App\Payment','customerNumber','customerNumber');
    }
}
