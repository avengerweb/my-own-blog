<?php

namespace App\Http\Controllers;

use App\Helpers\ConfigWriter;
use Config;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Response;
use Validator;

/**
 * Class DashboardController
 * @package App\Http\Controllers
 */
class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view("admin.dashboard");
    }

    /**
     * Edit current profile in dashboard
     *
     * @return Response
     */
    public function getCurrentProfile() {
        return view("admin.profile");
    }

    /**
     * Save current profile in dashboard
     *
     * @param  Request  $request
     * @return Response
     */
    public function postCurrentProfile(Request $request)
    {
        $data = $request->all();
        $user = \Auth::user();

        if ($data['email'] == $user->email)
            unset($data['email']);

        $validator = $this->profileValidator($data);

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $user->name = $data['name'];
        $user->email = isset($data['email'])? $data['email']: $user->email;

        if ($data['password'])
            $user->password = bcrypt($data['password']);

        $user->save();

        return redirect()->back()->with("success", "Profile is saved");
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function profileValidator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'email|max:255|unique:users',
            'password' => 'confirmed|min:6',
        ]);
    }

    /**
     * Get config edit page
     *
     * @return \Illuminate\View\View
     */
    public function getConfigEdit() {
        return view("admin.config");
    }


    /**
     * Check and save configs
     *
     * @param ConfigWriter $writer
     * @param  Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postConfigEdit(ConfigWriter $writer, Request $request) {

        Config::set("website.title", $request->get("title"));
        Config::set("website.description", $request->get("description"));
        Config::set("website.keywords", $request->get("keywords"));
        Config::set("website.counters", $request->get("counters"));
        Config::set("website.author", $request->get("author"));

        $writer->save();
        return redirect("/admin");
    }
}
