<?php

namespace App\Services\Blog;

use Illuminate\Contracts\Filesystem\Filesystem;

class ResourcesService
{
    /**
     * @var Filesystem
     */
    private $storage;

    /**
     * PostsService constructor.
     */
    public function __construct()
    {
        $this->storage = \Storage::disk('public');
    }

    /**
     *  Upload resource
     */
    public function upload()
    {}

    /**
     * Get all available public resources in directory
     *
     * @param string|null $directory
     * @param bool $recursive
     * @return array
     */
    public function getResources($directory = null, $recursive = true) : array
    {
        return $this->storage->files($directory, $recursive);
    }
}
