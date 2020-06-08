<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // See register controller
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // not used
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        // Not used
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->update($this->validateRequest());
        $this->storeImage($user);
        return redirect('user/'.$user->id);
    }

    public function changeRole(Request $request, User $user)
    {
        $newRole = $user->role == 'admin' ? 'user' : 'admin';
        $user->role = $newRole;
        $user->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
    }

    private function validateRequest() {
        return tap(request()->validate([
                'name' => 'required|max:256',
                'email' => 'required|email',
            ]), function() {
                if(request()->has('image')) {
                    request()->validate([
                        'image' => 'file|image|max:5000',
                    ]);
                }
            }
        );
    }

    private function storeImage($user) {
        if(request()->has('image')) {
            $user->update([
                'image' => request()->image->store('user-img', 'public'),
            ]);
        }
    }
}
