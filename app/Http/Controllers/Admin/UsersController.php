<?php

namespace App\Http\Controllers\Admin;

use App\Models\Clubs;
use App\Models\League;
use App\Models\RaceCategory;
use App\Models\Races;
use App\User;
use Exception;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreUsersRequest;
use App\Http\Requests\Admin\UpdateUsersRequest;
use App\Http\Requests\Admin\StoreSelectRaceRequest;

class UsersController extends Controller
{
    /**
     * Display a listing of User.
     *
     * @return Response
     */
    public function index()
    {
        if (! Gate::allows('users_manage') && ! Gate::allows('view_users')) {
            return abort(401);
        }

        $users = User::where('id', '!=', 1)->get();

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating new User.
     *
     * @return Response
     */
    public function create()
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }
        $roles = Role::get()->pluck('name', 'name');
        $races = Races::all();
        $race_categories = RaceCategory::all();
        $clubs = Clubs::all();
        $league = League::find(1);

        return view('admin.users.create', compact('roles', 'races', 'clubs', 'league', 'race_categories'));
    }

    /**
     * Store a newly created User in storage.
     *
     * @param StoreUsersRequest $request
     * @return Response
     */
    public function store(StoreUsersRequest $request)
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }
        $data = $request->all();
        $user = User::create($request->all());
        $roles = $request->input('roles') ? $request->input('roles') : [];
        $user->assignRole($roles);

        $club = Clubs::find($data['club']);
        $club->users()->attach([
            'user_id' => $user->id
        ]);

        if(isset($data['event'])){
            foreach ($data['event'] as $event){
                $race = Races::find($event);
                $race->users()->attach([
                    'user_id' => $user->id
                ]);
            }
        }

        return redirect()->route('admin.users.index');
    }


    /**
     * Show the form for editing User.
     *
     * @param User $user
     * @return Response
     */
    public function edit(User $user)
    {
        if (! Gate::allows('users_manage') && Auth::user()->id != $user->id) {
            return abort(401);
        }
        $roles = Role::get()->pluck('name', 'name');
        $races = Races::all();
        $clubs = Clubs::all();
        $race_categories = RaceCategory::all();

        return view('admin.users.edit', compact('user', 'roles', 'races', 'clubs', 'race_categories'));
    }

    /**
     * Update User in storage.
     *
     * @param UpdateUsersRequest $request
     * @param User $user
     * @return Response
     */
    public function update(UpdateUsersRequest $request, User $user)
    {
        if (! Gate::allows('users_manage') && Auth::user()->id != $user->id) {
            return abort(401);
        }
        $data = $request->all();
        $user->update($request->all());
        $roles = $request->input('roles') ? $request->input('roles') : [];
        if($roles){
            $user->syncRoles($roles);
        }

        $user->club()->detach();
        $user->club()->attach([
            'club_id' => $data['club']
        ]);

        return redirect()->route('admin.users.edit', $user->id);
    }

    public function show(User $user)
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }

        $user->load('roles');

        return view('admin.users.show', compact('user'));
    }

    /**
     * Remove User from storage.
     *
     * @param User $user
     * @return Response
     * @throws Exception
     */
    public function destroy(User $user)
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }

        $user->delete();

        return redirect()->route('admin.users.index');
    }

    /**
     * @param StoreSelectRaceRequest $request
     * @return RedirectResponse
     */
    public function selectRaces(StoreSelectRaceRequest $request){
        foreach ($request['event'] as $event){
            $race = Races::find($event);
            $race->users()->attach([
                'user_id' => Auth::user()->id
            ]);
        }

        return redirect()->route('admin.home');
    }

}
