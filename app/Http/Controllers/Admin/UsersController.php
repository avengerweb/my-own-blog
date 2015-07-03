<?php

namespace App\Http\Controllers\Admin;

use App\Models\UserAccess;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;

/**
 * Class UsersController
 * @package App\Http\Controllers\Admin
 */
class UsersController extends Controller
{
    public function __construct() {
        $this->middleware("access:users_manage");
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getIndex()
    {
        return view("admin.user.users")->with("users", User::all());
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
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
            'level' => 'required|min:0|max:255|integer',
        ]);

        if (!$validator->fails()) {
            $user = User::create([
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'password' => bcrypt($request->get('password'))
            ]);

            if ($request->get("level") > 0)
            {
                $access = new UserAccess();
                $access->level = $request->get("level");

                $user->access()->save($access);
            }
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
        if ($user = User::find($id)) {

            $validator = Validator::make($request->all(), [
                'name' => 'required|max:255',
                'email' => 'required|email|max:255'. ($request->get("email") == $user->email ? '' : '|unique:users'),
                'password' => 'confirmed|min:6',
                'level' => 'required|min:0|max:255|integer',
            ]);

            if (!$validator->fails()) {
                $user->name = $request->get("name");

                $access = $user->access;

                if ($access) {
                    if ($request->get("level") == 0)
                        $user->access()->delete();
                    else
                        $access->level = $request->get("level");

                    $access->save();
                }
                else
                    if ($request->get("level") > 0)
                    {
                        $access = new UserAccess();
                        $access->level = $request->get("level");

                        $user->access()->save($access);
                    }

                if ($request->get('password'))
                    $user->password = bcrypt($request->get('password'));

                $user->email = $request->get("email");
                $user->save();
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
        $user = User::find($id);

        if ($user)
            $user->access()->delete();

        return ["success" => $user ? $user->delete() : false];
    }
}
