<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('show');
        $this->authorizeResource(User::class, 'profile');
    }

    /**
     * Display a listing of the resource.
     *
     * @return User[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
//        $username = auth()->user()->name;
//        return view('profile.show', compact('username'));
        return User::all();
    }

    /**
     * Display the specified resource.
     *
     * @param User $profile
     * @return Response
     */
    public function show(User $profile)
    {
        $quizzes = $profile->quizzes()->has("questions")->get();
        return view('profile.show', compact('profile', 'quizzes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $profile
     * @return Response
     */
    public function edit(User $profile)
    {
        return view('profile.edit', compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
