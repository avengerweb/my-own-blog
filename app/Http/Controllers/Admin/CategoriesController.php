<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog\Category;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;

/**
 * Class CategoriesController
 * @package App\Http\Controllers\Admin
 */
class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getIndex()
    {
        return view("admin.blog.categories.list")->with("categories", Category::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function postStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255|unique:categories',
        ]);

        if (!$validator->fails()) {
            $category = new Category();
            $category->name = $request->get("name");
            $category->generateSlug();
            $category->save();
        }
        else
            $this->throwValidationException($request, $validator);

        return redirect()->back();
    }


    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int $id
     * @return Response
     */
    public function postUpdate(Request $request, $id)
    {
        if ($category = Category::find($id)) {

            if ($category->name == $request->get("name"))
                return [];

            $validator = Validator::make($request->all(), [
                'name' => 'required|max:255|unique:categories',
            ]);
            if (!$validator->fails()) {
                $category->name = $request->get("name");
                $category->generateSlug();
                $category->save();
            }
            else
                return ["errors" => $validator->getMessageBag()->toArray()];
        }

        return [];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function getDestroy($id)
    {
        $category = Category::find($id);
        return ["success" => $category ? $category->delete() : false];
    }
}
