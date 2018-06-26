<?php

namespace Corp;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function users(){
        return $this->belongsToMany('Corp\User', 'role_user');
    }

    public function permissions(){
        return $this->belongsToMany('Corp\Permission', 'permission_role');
    }

    public function hasPermission($name, $require = false)
    {
        if (is_array($name)) {
            foreach ($name as $permissionName) {
                $hasPermission = $this->hasPermission($permissionName);
                if ($hasPermission && !$require) {
                    return true;
                } elseif (!$hasPermission && $require) {
                    return false;
                }
            }
            return $require;
        } else {
            foreach ($this->permissions as $permission) {
                if ($permission->name == $name) {
                    return true;
                }
            }
        }
        return false;
    }

    public function savePermission($inputPermissions){
       if(!empty($inputPermissions)){
         // to read about method sync
         $this->permissions()->sync($inputPermissions);
       } else {
         $this->permissions()->detach();
       }

       return TRUE;
    }
}
