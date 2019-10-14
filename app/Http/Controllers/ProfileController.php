<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified'])->except('show');
        $this->middleware('password.confirm')->only('edit');
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
     * @param User $profile
     * @return Response
     */
    public function update(Request $request, User $profile)
    {
        $data = $request->validate([
            "name" => "nullable|unique:users,name|min:5|max:255|alpha_dash",
            "email" => "nullable|unique:users,email|confirmed|email|max:255",
            "password" => "nullable|confirmed|min:8|max:255",
            "current_password" => "required|max:255"
        ]);

        if (!Hash::check($data["current_password"], $profile->getAuthPassword())) {
            return back()->withInput()->with('error', 'Passwort ist ungültig');
        }

        $data = array_filter($data); // Alle null Werte entfernen

        if (isset($data["email"])) {
            $data["email_verified_at"] = null;
        }

        if (isset($data["password"])) {
            $data["password"] = Hash::make($data["password"]);
        }

        $profile->update($data);

        return back()->with('ok', 'Profil wurde aktualisiert.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $profile
     * @return void
     */
    public function destroy(User $profile)
    {
        //
    }
}
