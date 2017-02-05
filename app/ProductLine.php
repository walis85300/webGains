<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductLine extends Model
{
    public $incrementing = false;
    public $timestamps = false;
    

    protected $table = 'productlines';

    protected $primaryKey = 'productLine';

    protected $visible = ['productLine','textDescription','htmlDescription','image'];
    protected $fillable = ['productLine','textDescription','htmlDescription','image'];

    protected $appends = ['url'];

    public function products() {
    	return $this->hasMany('App\Product','productLine','productLine');
    }

    public function getUrlAttribute() {
    	return route('productline.show', $this->productLine);
    }
}
