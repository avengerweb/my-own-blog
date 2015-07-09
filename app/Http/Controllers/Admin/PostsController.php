<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog\Post;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view("admin.blog.posts.list", [
            "posts" => Post::orderBy("id", "desc")->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view("admin.blog.posts.add");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'title' => 'required|max:255|unique:posts',
            'description' => 'required|max:5000',
            'content' => 'required|max:40000',
            'active_from' => 'date',
            'state' => 'required|integer|min:0|max:2',
            'disable_comments' => 'boolean'
        ]);

        if (!$validator->fails()) {
            /*
             * TODO::Categories check...
             * */
            $post = new Post();
            $post->title = $request->get("title");
            $post->generateSlug();
            $post->description = $request->get("description");
            $post->content = $request->get("content");

            if ($request->get('state') == 2)
                $post->active_from = $request->get("active_from");

            $post->state = $request->get("state");
            $post->disable_comments = $request->has("disable_comments");

            $post->save();
        }
        else
            $this->throwValidationException($request, $validator);

        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view("admin.blog.posts.edit")->withPost($post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        $validator = \Validator::make($request->all(), [
            'title' => 'required|max:255' . ( $post->title == $request->get("title") ? '' : '|unique:posts' ),
            'description' => 'required|max:5000',
            'content' => 'required|max:40000',
            'active_from' => 'date',
            'state' => 'required|integer|min:0|max:2',
            'disable_comments' => 'boolean'
        ]);

        if (!$validator->fails()) {
            /*
             * TODO::Categories check...
             * */
            $post->title = $request->get("title");
            $post->generateSlug();
            $post->description = $request->get("description");
            $post->content = $request->get("content");

            if ($request->get('state') == 2)
                $post->active_from = $request->get("active_from");

            $post->state = $request->get("state");
            $post->disable_comments = $request->has("disable_comments");

            $post->save();

        }
        else
            $this->throwValidationException($request, $validator);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $permission = Post::find($id);
        return ["success" => $permission ? $permission->delete() : false];
    }
}
