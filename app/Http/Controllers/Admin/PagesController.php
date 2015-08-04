<?php

namespace App\Http\Controllers\Admin;

use App\Models\Page;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view("admin.pages.list", [
            "pages" => Page::orderBy("id", "desc")->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view("admin.pages.add");
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
            'title' => 'required|max:255',
            'keywords' => 'max:255',
            'url' => 'required|max:255|alpha_dash|unique:pages',
            'description' => 'required|max:1000',
            'content' => 'required|max:40000',
            'active' => 'boolean'
        ]);

        if (!$validator->fails()) {

            $page = new Page();
            $page->title = $request->get("title");
            $page->url = $request->get("url");
            $page->keywords = $request->get("keywords");
            $page->description = $request->get("description");
            $page->content = $request->get("content");
            $page->active = $request->has("active");

            $page->save();
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
        $page = Page::findOrFail($id);
        return view("admin.pages.edit")->withPage($page);
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
        $page = Page::findOrFail($id);

        $validator = \Validator::make($request->all(), [
            'title' => 'required|max:255',
            'url' => 'required|alpha_dash|max:255' . ( $page->url == $request->get("url") ? '' : '|unique:pages' ),
            'keywords' => 'max:255',
            'description' => 'required|max:1000',
            'content' => 'required|max:40000',
            'active' => 'boolean'
        ]);

        if (!$validator->fails()) {

            $page->title = $request->get("title");
            $page->url = $request->get("url");
            $page->keywords = $request->get("keywords");
            $page->description = $request->get("description");
            $page->content = $request->get("content");
            $page->active = $request->has("active");

            $page->save();

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
        $page = Page::find($id);
        return ["success" => $page ? $page->delete() : false];
    }
}
