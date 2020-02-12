<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Clubs;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\Admin\StoreOrUpdateClubsRequest;

class ClubsController extends Controller
{
    protected $view_path = "admin.clubs.";
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        if (! Gate::allows('clubs_manage')) {
            return abort(401);
        }

        $data = Clubs::all();
        return view($this->view_path.'index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        if (! Gate::allows('clubs_manage')) {
            return abort(401);
        }

        return view($this->view_path.'create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreOrUpdateClubsRequest $request
     * @return Response
     */
    public function store(StoreOrUpdateClubsRequest $request)
    {
        if (! Gate::allows('clubs_manage') ) {
            return abort(401);
        }
        Clubs::create($request->all());

        return redirect()->route('admin.clubs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Clubs $club
     * @return Response
     */
    public function show(Clubs $club)
    {
        if (! Gate::allows('clubs_manage') ) {
            return abort(401);
        }
        return view($this->view_path.'show', compact('club'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Clubs $club
     * @return Response
     */
    public function edit(Clubs $club)
    {
        if (! Gate::allows('clubs_manage') ) {
            return abort(401);
        }

        return view($this->view_path.'edit', compact('club'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StoreOrUpdateClubsRequest $request
     * @param Clubs $club
     * @return Response
     */
    public function update(StoreOrUpdateClubsRequest $request, Clubs $club)
    {
        if (! Gate::allows('clubs_manage') ) {
            return abort(401);
        }

        $club->update($request->all());
        return redirect()->route('admin.clubs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Clubs $club
     * @return Response
     * @throws Exception
     */
    public function destroy(Clubs $club)
    {
        if (! Gate::allows('clubs_manage')) {
            return abort(401);
        }

        $club->delete();

        return redirect()->route('admin.clubs.index');
    }
}
