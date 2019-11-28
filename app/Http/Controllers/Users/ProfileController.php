<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateProfileRequest;
use App\User;
use Illuminate\Database\Eloquent\Collection;
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
     * @return User[]|Collection
     */
    public function index()
    {
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
        $quizzes = $profile->quizzes()->public()->paginate(5);
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
     * @param UpdateProfileRequest $request
     * @param User $profile
     * @return Response
     */
    public function update(UpdateProfileRequest $request, User $profile)
    {
        $data = $request->validated();

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
     * @throws \Exception
     */
    public function destroy(User $profile)
    {
        $profile->delete();
    }
}
