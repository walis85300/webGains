<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
	// It could be improved using auto_incrementing in the DB
    public $incrementing = false;
    public $timestamps = false;
    

    protected $table = 'offices';

    protected $primaryKey = 'officeCode';

    protected $fillable = ['officeCode','city','phone','addressLine1','addressLine2','state','country','postalCode','territory'];
    protected $visible = ['officeCode','city','phone','addressLine1','addressLine2','state','country','postalCode','territory'];

    public function employees() {
    	return $this->hasMany('App\Employee','officeCode','officeCode');
    }

    public function getUrlAttribute() {
    	return route('offices.show', $this->officeCode);
    }

}
