<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreOrUpdateSettingsRequest;
use App\Models\Settings;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

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

    public function coming(){
        if (! Gate::allows('settings_manage') ) {
            return abort(401);
        }
        $setting = Settings::find(1);
        $setting = json_decode($setting->content, true);

        return view($this->view_path.'coming', compact('setting'));
    }

    public function updateComing(Request $request)
    {
        if (! Gate::allows('settings_manage') ) {
            return abort(401);
        }
        $data = $request->only(['show', 'countdown', 'date', 'title', 'description']);

        $text = Settings::findOrFail(1);
        $text->update([
            'content' => json_encode($data),
        ]);

        return redirect()->back();
    }

    public function updatePaypal(Request $request)
    {
        if (! Gate::allows('settings_manage') ) {
            return abort(401);
        }
        $text = Settings::where('title', 'Paypal Client ID')->first();
        $text->content = $request->client_id;
        $text->save();

        return redirect()->back();
    }

    public function updateMail(Request $request)
    {
        if (! Gate::allows('settings_manage') ) {
            return abort(401);
        }

        $driver = Settings::where('title', 'SMTP Driver')->first();
        $driver->content = $request->driver;
        $driver->save();

        $host = Settings::where('title', 'SMTP Host')->first();
        $host->content = $request->host;
        $host->save();

        $port = Settings::where('title', 'SMTP Port')->first();
        $port->content = $request->port;
        $port->save();

        $from = Settings::where('title', 'SMTP From')->first();
        $from->content = $request->from;
        $from->save();

        $from_name = Settings::where('title', 'SMTP From name')->first();
        $from_name->content = $request->from_name;
        $from_name->save();

        $encryption = Settings::where('title', 'SMTP Encryption')->first();
        $encryption->content = $request->encryption;
        $encryption->save();

        $username = Settings::where('title', 'SMTP Username')->first();
        $username->content = $request->username;
        $username->save();

        $password = Settings::where('title', 'SMTP Password')->first();
        $password->content = $request->password;
        $password->save();

        return redirect()->back();
    }
}
