<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Races;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\Admin\StoreOrUpdateRacesRequest;
use PDF;

class RacesController extends Controller
{

    protected $view_path = "admin.races.";

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        if (! Gate::allows('races_manage') && ! Gate::allows('view_races') ) {
            return abort(401);
        }

        $data = Races::all();
        return view($this->view_path.'index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        if (! Gate::allows('races_manage')) {
            return abort(401);
        }

        return view($this->view_path.'create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreOrUpdateRacesRequest $request
     * @return Response
     */
    public function store(StoreOrUpdateRacesRequest $request)
    {
        if (! Gate::allows('races_manage') ) {
            return abort(401);
        }
        Races::create($request->all());

        return redirect()->route('admin.races.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Races $race
     * @return Response
     */
    public function show(Races $race)
    {
        if (! Gate::allows('races_manage') && ! Gate::allows('view_races') ) {
            return abort(401);
        }
        return view($this->view_path.'show', compact('race'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Races $race
     * @return Response
     */
    public function edit(Races $race)
    {
        if (! Gate::allows('races_manage') ) {
            return abort(401);
        }

        return view($this->view_path.'edit', compact('race'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StoreOrUpdateRacesRequest $request
     * @param Races $race
     * @return RedirectResponse|void
     */
    public function update(StoreOrUpdateRacesRequest $request, Races $race)
    {
        if (! Gate::allows('races_manage') ) {
            return abort(401);
        }

        $race->update($request->all());
        return redirect()->route('admin.races.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Races $race
     * @return RedirectResponse|void
     * @throws Exception
     */
    public function destroy(Races $race)
    {
        if (! Gate::allows('races_manage')) {
            return abort(401);
        }

        $race->delete();

        return redirect()->route('admin.races.index');
    }

    public function myRaces() {
        $user = Auth::user();
        return view('admin.races.my-races', compact('user'));
    }

    public function pdf($id) {
        if (! Gate::allows('races_manage') && ! Gate::allows('view_races') ) {
            return abort(401);
        }
        $race = Races::find($id);

        $pdf = PDF::loadView('admin.races.marshals-pdf', compact('race'));

        return $pdf->download('marshals.pdf');
    }

    public function present(Request $request){
        $present = DB::table('user_races')
            ->where('user_id', $request->user_id)
            ->where('race_id', $request->race_id)
            ->first();
        if($present->present == 'no'){
            DB::table('user_races')
                ->where('user_id', $request->user_id)
                ->where('race_id', $request->race_id)
                ->update(['present' => 'yes']);
        }else{
            DB::table('user_races')
                ->where('user_id', $request->user_id)
                ->where('race_id', $request->race_id)
                ->update(['present' => 'no']);
        }
    }

}
