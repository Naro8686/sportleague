<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PrivacyPolicy;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;

class PrivacyPolicyController extends Controller
{
    protected $view_path = "admin.privacy-policy.";
    /**
     * Display a listing of PrivacyText.
     *
     * @return Response
     */
    public function index()
    {
        if (! Gate::allows('privacy_manage')) {
            return abort(401);
        }

        $data = PrivacyPolicy::first();

        if(!$data){
            return view($this->view_path.'create');
        }else{
            return redirect()->route($this->view_path.'show', $data->id);
        }
    }

    /**
     * Show the form for creating new PrivacyText.
     *
     * @return Response
     */
    public function create()
    {
        if (! Gate::allows('privacy_manage')) {
            return abort(401);
        }

        return view($this->view_path.'create');
    }

    /**
     * Store a newly created PrivacyText in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        if (! Gate::allows('privacy_manage')) {
            return abort(401);
        }

        PrivacyPolicy::create([
            'title' => $request->input('title'),
            'text' => $request->input('text'),
        ]);

        return redirect()->route($this->view_path.'index');
    }


    /**
     * Show the form for editing PrivacyText.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        if (! Gate::allows('privacy_manage')) {
            return abort(401);
        }

        $data = PrivacyPolicy::findOrFail($id);

        return view($this->view_path.'.edit', compact('data'));
    }

    /**
     * Update PrivacyText in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        if (! Gate::allows('privacy_manage')) {
            return abort(401);
        }

        $data = PrivacyPolicy::findOrFail($id);
        $data->update([
            'title' => $request->input('title'),
            'text' => $request->input('text'),
        ]);

        return redirect()->route($this->view_path.'index');
    }


    /**
     * Display PrivacyText.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        if (! Gate::allows('privacy_manage')) {
            return abort(401);
        }

        $data = PrivacyPolicy::findOrFail($id);

        return view($this->view_path.'show', compact('data'));
    }


    /**
     * Remove PrivacyText from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('privacy_manage')) {
            return abort(401);
        }

        $data = PrivacyPolicy::findOrFail($id);
        $data->delete();

        return redirect()->route($this->view_path.'index');
    }

    public function privacy_page(){
        $policy = PrivacyPolicy::first();
        return view('website.privacy-policy.index', compact('policy'));
    }
}
