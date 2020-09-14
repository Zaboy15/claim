<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = "users";
    protected $primaryKey = "user_id";
    protected $fillable = [
        'username', 
        'email', 
        'password', 
        'fullname', 
        'phone', 
        'picture',
        'created_by',
        'modified_by',
    ];
    protected $timestamp = false;

    const UPDATED_AT = null;
    const CREATED_AT = null;
}
