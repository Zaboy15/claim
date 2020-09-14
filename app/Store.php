<?php

namespace App;

use App\Users;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $table = "store";
    protected $primaryKey = "store_id";
    protected $fillable = [
        'name',
    	'city',
	    'province',
	    'created_by',
	    'modified_by',
	    'created_date',
	    'modified_date',
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
