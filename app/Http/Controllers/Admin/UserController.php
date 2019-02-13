<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreUser;
use App\Http\Requests\UpdateUser;
use App\User;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.users.index')
               ->with('users', User::withCount('posts')->get());
    }

    public function create()
    {
        $this->authorize('create', User::class);

        return view('admin.users.create');
    }

    public function store(StoreUser $request)
    {
        $this->authorize('create', User::class);

        return $request->store();
    }

    public function show(User $user)
    {
        $user->load('posts');

        return view('admin.users.show', compact('user'));
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user);

        return view('admin.users.edit', compact('user'));
    }

    public function update(UpdateUser $request, User $user)
    {
        $this->authorize('update', $user);

        return $request->update($user);
    }

    public function destroy(User $user)
    {
        $this->authorize('delete', $user);

        $user->posts()->delete();

        $user->delete();
    }
}
