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
        $smtp = Settings::where('title', 'SMTP')->pluck('content')->first();
        $smtp = json_decode($smtp, true);
        $reset = Settings::where('title', 'Reset')->pluck('content')->first();
        $reset = json_decode($reset, true);

        return view($this->view_path.'coming', compact(['setting', 'smtp', 'reset']));
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

        Settings::where('title', 'contact_mail')->update(['content' => $request->contact_mail]);
        Settings::where('title', 'bcc_mail')->update(['content' => $request->bcc_mail]);

        $smtp = $request->only('driver', 'host', 'port', 'from', 'from_name', 'username', 'password', 'encryption');

        $data = Settings::where('title', 'SMTP')->first();
        $data->content = json_encode($smtp);
        $data->save();

        return redirect()->back();
    }

    public function updateReset(Request $request)
    {
        if (! Gate::allows('settings_manage') ) {
            return abort(401);
        }

        $reset = $request->only('hello', 'second', 'button', 'bottom', 'regards', 'manager');
        $data = Settings::where('title', 'Reset')->first();
        $data->content = json_encode($reset);
        $data->save();

        return redirect()->back();
    }

    public function updateLogo(Request $request)
    {
        if (! Gate::allows('settings_manage') ) {
            return abort(401);
        }

        if($request->logo){
            $fileName = 'white_logo'. time().'.'.$request->logo->extension();

            $request->logo->move(public_path('logo'), $fileName);
            $logo = Settings::where('title','logo')->first();
            if($logo->content != 'default_white.png'){
                @unlink('logo/'.$logo->content);
            }
            $logo->update([
                'content' => $fileName
            ]);
        }

        if($request->black_logo){
            $fileName = 'black_logo'. time().'.'.$request->black_logo->extension();

            $request->black_logo->move(public_path('logo'), $fileName);
            $logo = Settings::where('title','black_logo')->first();
            if($logo->content != 'default_black.png'){
                @unlink('logo/'.$logo->content);
            }
            $logo->update([
                'content' => $fileName
            ]);
        }


        return redirect()->back();
    }
}
