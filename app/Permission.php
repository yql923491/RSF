<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    //
    protected $table = 'permission';
    public function roles()
    {
    	return $this->belongsToMany('App\Role','roles_permission','role_id','permission_id');
    }
}
