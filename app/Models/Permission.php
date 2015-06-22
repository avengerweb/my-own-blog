<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Permission
 *
 * @property integer $id 
 * @property integer $level 
 * @property string $permission 
 * @property \Carbon\Carbon $created_at 
 * @property \Carbon\Carbon $updated_at 
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Permission whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Permission whereLevel($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Permission wherePermission($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Permission whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Permission whereUpdatedAt($value)
 */
class Permission extends Model
{
    private static $permissionsForLevel = [];

    /**
     * Get all permissions for given account level
     *
     * @property integer $level
     * @return array
     */
    public static function getPermissionsForLevel($level)
    {
        if (!isset(self::$permissionsForLevel[$level])) {
            $permissions = self::where('level', '<=', $level)->get();
            foreach($permissions as $permission)
            {
                self::$permissionsForLevel[$level][$permission->permission] = $permission;
            }
        }

        return self::$permissionsForLevel[$level];
    }
}
