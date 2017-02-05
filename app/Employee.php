<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public $incrementing = false;
    public $timestamps = false;
    

    protected $table = 'employees';

    protected $primaryKey = 'employeeNumber';

    protected $fillable = ['employeeNumber','lastName','firstName','extension','email','officeCode','reportsTo','jobTitle'];

    public function office() {
    	return $this->belongsTo('App\Office','officeCode','officeCode');
    }

    public function chief() {
    	return $this->belongsTo('App\Employee','reportsTo','employeeNumber');
    }

    public function employeesInCharge() {
    	return $this->hasMany('App\Employee','reportsTo','employeeNumber');
    }
}
