<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = "products";
    protected $primaryKey = "product_id";
    protected $fillable = [
        'name',
	    'created_date',
	    'modified_date',
	    'created_by',
	    'modified_by',
    ];
    protected $timestamp = false;

    const UPDATED_AT = null;
    const CREATED_AT = null;

    // public function creator(){
    // 	return $this->hasMany('App\Role', 'role_id', 'role_id');
    // }

    public function creator(){
        return $this->hasMany('App\Users', 'user_id', 'created_by');
    }

    public function modificator(){
        return $this->hasMany('App\Users', 'user_id', 'modified_by');
    }
}
