<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RaceCategory;
use Illuminate\Http\Request;
use Illuminate\Http\Response as ResponseAlias;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\Admin\StoreOrUpdateRaceCategoryRequest;

class RaceCategoryController extends Controller
{
    protected $view_path = "admin.race-categories.";
    /**
     * Display a listing of the resource.
     *
     * @return ResponseAlias
     */
    public function index()
    {
        if (! Gate::allows('race_categories_manage') ) {
            return abort(401);
        }

        $data = RaceCategory::all();
        return view($this->view_path.'index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return ResponseAlias
     */
    public function create()
    {
        if (! Gate::allows('race_categories_manage') ) {
            return abort(401);
        }

        return view($this->view_path.'create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreOrUpdateRaceCategoryRequest $request
     * @return ResponseAlias
     */
    public function store(StoreOrUpdateRaceCategoryRequest $request)
    {
        if (! Gate::allows('race_categories_manage') ) {
            return abort(401);
        }

        RaceCategory::create($request->all());

        return redirect()->route('admin.race-categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param RaceCategory $raceCategory
     * @return ResponseAlias
     */
    public function show(RaceCategory $raceCategory)
    {
        if (! Gate::allows('race_categories_manage') ) {
            return abort(401);
        }

        return view($this->view_path.'show', compact('raceCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param RaceCategory $raceCategory
     * @return ResponseAlias
     */
    public function edit(RaceCategory $raceCategory)
    {
        if (! Gate::allows('race_categories_manage') ) {
            return abort(401);
        }

        return view($this->view_path.'edit', compact('raceCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StoreOrUpdateRaceCategoryRequest $request
     * @param RaceCategory $raceCategory
     * @return ResponseAlias
     */
    public function update(StoreOrUpdateRaceCategoryRequest $request, RaceCategory $raceCategory)
    {
        if (! Gate::allows('race_categories_manage') ) {
            return abort(401);
        }

        $raceCategory->update($request->all());
        return redirect()->route('admin.race-categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param RaceCategory $raceCategory
     * @return ResponseAlias
     * @throws \Exception
     */
    public function destroy(RaceCategory $raceCategory)
    {
        if (! Gate::allows('race_categories_manage') ) {
            return abort(401);
        }

        $raceCategory->delete();

        return redirect()->route('admin.race-categories.index');
    }
}
