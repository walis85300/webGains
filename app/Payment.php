<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Traits\HasCompositePrimaryKey;

class Payment extends Model
{
	use HasCompositePrimaryKey;

    public $incrementing = false;
    public $timestamps = false;
    

    protected $table = 'payments';

    protected $primaryKey = ['customerNumber','checkNumber'];

    protected $fillable = ['customerNumber','checkNumber','paymentDate','amount'];

    public function customer() {
    	return $this->belongsTo('App\Customer','customerNumber','customerNumber');
    }

}
