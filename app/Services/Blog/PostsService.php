<?php

namespace App\Services\Blog;

use App\Entity\Blog\Post;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class PostsService
{
    /**
     * @var ResourcesService
     */
    private $resourcesService;

    /**
     * PostsService constructor.
     * @param ResourcesService $resourcesService
     */
    public function __construct(ResourcesService $resourcesService)
    {
        $this->resourcesService = $resourcesService;
    }

    /**
     * Create new post
     *
     * @param $data
     * @param Request|null $request
     * @return Post
     */
    public function create($data, Request $request = null) : Post
    {
        $post = Post::create($data);
        return $post;
    }

    /**
     * Get paginated list of posts
     *
     * @param bool $active - show only active posts
     * @return LengthAwarePaginator
     */
    public function getPaginatedList(bool $active = true) : LengthAwarePaginator
    {
        return Post::query()->when($active, function($query)
        {
            return $query->whereStatus(Post::STATUS_ACTIVE);
        })->paginate(20);
    }

    /**
     * @param string $slug
     * @param bool $active - get only active posts
     * @return mixed
     */
    public function getPostBySlug(string $slug, bool $active = true) : Post
    {
        return Post::whereSlug($slug)->when($active, function($query)
        {
            return $query->whereStatus(Post::STATUS_ACTIVE);
        })->firstOrFail();
    }

    /**
     * @param int $id
     * @param bool $active - get only active posts
     * @return mixed
     */
    public function getPostById(int $id, bool $active = true) : Post
    {
        return Post::query()->when($active, function($query)
        {
            return $query->whereStatus(Post::STATUS_ACTIVE);
        })->find($id);
    }
}
