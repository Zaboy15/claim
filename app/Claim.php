<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Claim extends Model
{
    protected $table = "claim";
    protected $primaryKey = "claim_id";
    protected $fillable = [
        'store_id',
	    'product_detail_id',
	    'fullname',
	    'phone',
	    'status_id',
	    'created_date',
	    'modified_date',
	    'created_by',
	    'modified_by',
    ];
    protected $timestamp = false;

    const UPDATED_AT = null;
    const CREATED_AT = null;

    public function status(){
    	return $this->hasMany('App\Status', 'status_id', 'status_id');
    }

    public function store(){
    	return $this->hasMany('App\Store', 'store_id', 'store_id');
    }
    
    public function sn(){
    	return $this->hasMany('App\ProductsDetail', 'product_detail_id', 'product_detail_id');
    }

    public function creator(){
        return $this->hasMany('App\Users', 'user_id', 'created_by');
    }

    public function modificator(){
        return $this->hasMany('App\Users', 'user_id', 'modified_by');
    }
}
