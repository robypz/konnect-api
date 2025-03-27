<?php

namespace App\Traits;

use App\Models\Role;
use MongoDB\Laravel\Relations\BelongsToMany;

trait HasRoles
{
    public function roles() : BelongsToMany
    {
        return $this->belongsToMany(Role::class);
    }

    public function hasRole($role)
    {
        return $this->roles->contains('name', $role);
    }

    public function assignRole($role)
    {
        return $this->roles()->attach($role);
    }

    public function removeRole($role)
    {
        return $this->roles()->detach($role);
    }

    public function syncRoles($roles)
    {
        return $this->roles()->sync($roles);
    }

    public function hasPermission($permission)
    {
        foreach ($this->roles as $role) {
            if ($role->permissions->contains('name', $permission)) {
                return true;
            }
        }

        return false;
    }

    public function hasAnyPermission($permissions)
    {
        foreach ($permissions as $permission) {
            if ($this->hasPermission($permission)) {
                return true;
            }
        }

        return false;
    }

    public function hasAllPermissions($permissions)
    {
        foreach ($permissions as $permission) {
            if (!$this->hasPermission($permission)) {
                return false;
            }
        }

        return true;
    }

    public function assignPermissions($permissions)
    {
        $roles = Role::whereIn('name', $permissions)->get();
        $this->roles()->sync($roles);
    }

    public function removePermissions($permissions)
    {
        $roles = Role::whereIn('name', $permissions)->get();
        $this->roles()->detach($roles);
    }

    public function syncPermissions($permissions)
    {
        $roles = Role::whereIn('name', $permissions)->get();
        $this->roles()->sync($roles);
    }


}
