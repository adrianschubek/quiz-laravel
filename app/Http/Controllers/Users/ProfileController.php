<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateProfileRequest;
use App\Like;
use App\User;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified'])->except('show');
        $this->middleware('password.confirm')->only('edit');
        $this->authorizeResource(User::class, 'profile');
    }

    public function index()
    {
        return User::all();
    }

    public function show(User $profile)
    {
        $quizzes = $profile->quizzes()->public()->paginate(5);

        $likes = Like::whereIn('likeable_id',
            fn(Builder $builder) => $builder
                ->select('id')
                ->from('quizzes')
                ->where('user_id', $profile->id)
        )->count();

        $playcount = $profile->quizzes->pluck('play_count')->sum();

        return view('profile.show', compact('profile', 'quizzes', 'playcount', 'likes'));
    }

    public function edit(User $profile)
    {
        return view('profile.edit', compact('profile'));
    }

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

    public function destroy(User $profile)
    {
        $profile->delete();
    }
}
