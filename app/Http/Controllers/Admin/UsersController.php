<?php

namespace App\Http\Controllers\Admin;

use App\Models\Clubs;
use App\Models\Races;
use App\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreUsersRequest;
use App\Http\Requests\Admin\UpdateUsersRequest;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;

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
        $clubs = Clubs::all();

        return view('admin.users.create', compact('roles', 'races', 'clubs'));
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

        foreach ($data['event'] as $event){
            $race = Races::find($event);
            $race->users()->attach([
                'user_id' => $user->id
            ]);
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

        return view('admin.users.edit', compact('user', 'roles', 'races', 'clubs'));
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

        return redirect()->route('admin.users.index');
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
     * @throws \Exception
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
     * Delete all selected User at once.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|Response|void
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }
        User::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }


}
