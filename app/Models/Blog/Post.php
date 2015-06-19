<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * App\Models\Blog\Post
 *
 * @property integer $id 
 * @property string $title 
 * @property string $slug 
 * @property string $description 
 * @property string $content 
 * @property integer $views 
 * @property integer $like 
 * @property integer $user_id 
 * @property integer $state
 * @property string $active_from 
 * @property boolean $disable_comments 
 * @property \Carbon\Carbon $created_at 
 * @property \Carbon\Carbon $updated_at 
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Blog\Post whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Blog\Post whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Blog\Post whereSlug($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Blog\Post whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Blog\Post whereContent($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Blog\Post whereViews($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Blog\Post whereLike($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Blog\Post whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Blog\Post whereState($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Blog\Post whereActiveFrom($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Blog\Post whereDisableComments($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Blog\Post whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Blog\Post whereUpdatedAt($value)
 */
class Post extends Model
{
    //

    /**
     * Generate slug from title for post
     *
     * @return void
     */
    public function generateSlug() {

        $this->slug = Str::slug($this->title);
    }
}
