<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\UserAccess
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $level
 * @property string $description
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserAccess whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserAccess whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserAccess whereLevel($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserAccess whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserAccess whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserAccess whereUpdatedAt($value)
 */
class UserAccess extends Model
{

}
