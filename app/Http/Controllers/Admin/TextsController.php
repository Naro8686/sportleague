<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreOrUpdateTextsRequest;
use App\Models\Texts;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;

class TextsController extends Controller
{
    protected $view_path = "admin.texts.";
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        if (! Gate::allows('texts_manage') ) {
            return abort(401);
        }
        $data = Texts::all();

        return view($this->view_path.'index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        if (! Gate::allows('texts_manage') ) {
            return abort(401);
        }

        return view($this->view_path.'create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreOrUpdateTextsRequest $request
     * @return Response
     */
    public function store(StoreOrUpdateTextsRequest $request)
    {
        if (! Gate::allows('texts_manage') ) {
            return abort(401);
        }

        Texts::create($request->all());

        return redirect()->route($this->view_path.'index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Texts $text
     * @return void
     */
    public function edit(Texts $text)
    {
        if (! Gate::allows('texts_manage') ) {
            return abort(401);
        }

        return view($this->view_path.'edit', compact('text'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StoreOrUpdateTextsRequest $request
     * @return Response
     */
    public function update(StoreOrUpdateTextsRequest $request, $id)
    {
        if (! Gate::allows('texts_manage') ) {
            return abort(401);
        }

        $text = Texts::findOrFail($id);
        $text->update([
            'value' => $request->input('value'),
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
        if (! Gate::allows('texts_manage') ) {
            return abort(401);
        }

        $data = Texts::findOrFail($id);
        $data->delete();

        return redirect()->route($this->view_path.'index');
    }
}
