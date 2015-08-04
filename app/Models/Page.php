<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Page
 *
 * @property integer $id 
 * @property string $url 
 * @property string $content 
 * @property boolean $active 
 * @property string $title 
 * @property string $keywords 
 * @property string $description 
 * @property \Carbon\Carbon $created_at 
 * @property \Carbon\Carbon $updated_at 
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Page whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Page whereUrl($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Page whereContent($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Page whereActive($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Page whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Page whereKeywords($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Page whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Page whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Page whereUpdatedAt($value)
 */
class Page extends Model
{
    //
}
