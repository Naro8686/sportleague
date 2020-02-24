<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreOrUpdateSettingsRequest;
use App\Models\Settings;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;

class SettingsController extends Controller
{
    protected $view_path = "admin.settings.";
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        if (! Gate::allows('settings_manage') ) {
            return abort(401);
        }
        $data = Settings::all();

        return view($this->view_path.'index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        if (! Gate::allows('settings_manage') ) {
            return abort(401);
        }

        return view($this->view_path.'create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreOrUpdateSettingsRequest $request
     * @return Response
     */
    public function store(StoreOrUpdateSettingsRequest $request)
    {
        if (! Gate::allows('settings_manage') ) {
            return abort(401);
        }

        Settings::create($request->all());

        return redirect()->route($this->view_path.'index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Settings $setting
     * @return void
     */
    public function edit(Settings $setting)
    {
        if (! Gate::allows('settings_manage') ) {
            return abort(401);
        }

        return view($this->view_path.'edit', compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StoreOrUpdateSettingsRequest $request
     * @param $id
     * @return Response
     */
    public function update(StoreOrUpdateSettingsRequest $request, $id)
    {
        if (! Gate::allows('settings_manage') ) {
            return abort(401);
        }

        $text = Settings::findOrFail($id);
        $text->update([
            'content' => $request->input('content'),
        ]);

        return redirect()->route($this->view_path.'index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('settings_manage') ) {
            return abort(401);
        }

        $data = Settings::findOrFail($id);
        $data->delete();

        return redirect()->route($this->view_path.'index');
    }
}
