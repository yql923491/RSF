<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
	protected $table = 'roles';
    //
    public function permissions()
    {
    	return $this->belongsToMany('App\Permission','roles_permission','permission_id','role_id');
    }
}
