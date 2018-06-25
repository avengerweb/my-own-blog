<?php

namespace App\Entity\Blog;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // Post statuses
    const STATUS_DISABLED = 0;
    const STATUS_ACTIVE = 1;
}
