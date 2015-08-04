<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * Post category
 * 
 * App\Models\Blog\Category
 *
 * @property integer $id
 * @property string $name
 * @property string $slug
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Blog\Category whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Blog\Category whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Blog\Category whereSlug($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Blog\Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Blog\Category whereUpdatedAt($value)
 */
class Category extends Model
{
    /**
     * Generate slug from title for post
     *
     * @return void
     */
    public function generateSlug() {

        $this->slug = Str::slug($this->name);
    }
}
