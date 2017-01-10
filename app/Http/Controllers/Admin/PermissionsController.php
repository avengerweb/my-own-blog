<?php

namespace App\Http\Controllers\Admin;

use App\Models\Permission;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;

/**
 * Class PermissionsController
 * @package App\Http\Controllers\Admin
 */
class PermissionsController extends Controller
{
    public function __construct() {
        $this->middleware("access:permissions_manage");
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view("admin.user.permissions")->with("permissions", Permission::orderBy("level")->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'permission' => 'required|max:255|alpha_dash|unique:permissions',
            'level' => 'required|min:1|max:255|integer',
        ]);

        if (!$validator->fails()) {
            $permission = new Permission();
            $permission->permission = $request->get("permission");
            $permission->level = $request->get("level");
            $permission->save();
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
    public function update(Request $request, $id)
    {
        if ($permission = Permission::find($id)) {

            $validator = Validator::make($request->all(), [
                'permission' => 'required|max:255|alpha_dash' .( $permission->permission != $request->get("permission") ? '|unique:permissions' : ''),
                'level' => 'required|min:1|max:255|integer',
            ]);
            if (!$validator->fails()) {
                $permission->permission = $request->get("permission");
                $permission->level = $request->get("level");
                $permission->save();
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
    public function destroy($id)
    {
        $permission = Permission::find($id);
        return ["success" => $permission ? $permission->delete() : false];
    }
}
