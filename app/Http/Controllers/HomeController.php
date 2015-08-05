<?php

namespace App\Http\Controllers;

use App\Models\Blog\Post;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Page;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Config;
use Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the posts.
     *
     * @return Response
     */
    public function index()
    {
        return Post::toShow()->orderBy("id", "desc")->simplePaginate(10);
    }

    /**
     * Welcome page
     *
     * @return Response
     */
    public function welcome()
    {
        return view("pages.main")->withPosts(Post::toShow()->orderBy("id", "desc")->simplePaginate(10));
    }

    /**
     * Get static page by url
     *
     * @param $url
     * @return mixed
     */
    public function getPage($url) {
        $page = Page::whereUrl($url)->first();
        if (!$page)
            throw (new ModelNotFoundException)->setModel(get_class($page));
        else {

            \Config::set("website.title", $page->title);
            \Config::set("website.keywords", $page->keywords);
            \Config::set("website.description", $page->description);

            return view("pages.page")->withPage($page);
        }
    }

    /**
     * Get post from blog by slug
     *
     * @param $slug
     * @return mixed
     */
    public function getPost($slug) {
        $post = Post::whereSlug($slug)->first();
        if (!$post)
            throw (new ModelNotFoundException)->setModel(get_class($post));
        else {
            //TODO:: Move it from there and add some logic :)
            if ($viewed = \Session::get("viewed"))
            {
                if (!isset($viewed[$slug]))
                {
                    $viewed[$slug] = true;
                    \Session::set("viewed", $viewed);
                    $post->views++;
                    $post->save();
                }
            } else {
                $viewed[$slug] = true;
                \Session::set("viewed", $viewed);
                $post->views++;
                $post->save();
            }

            return view("pages.post")->withPost($post);
        }
    }
}
