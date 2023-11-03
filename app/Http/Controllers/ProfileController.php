<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**Display the user's profile form.*/
    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

    /**Update the user's profile information.*/
    public function update($request)
    {
    }
    /**Update the user's user password.*/
    public function password($request)
    {
    }

    /**Delete the user's account.*/
    public function destroy($id)
    {
        // $user = User::find($id);

        // Auth::logout();
        // $user->delete();

        // $request->session()->invalidate();
        // $request->session()->regenerateToken();

        // return redirect()->route('login');
    }


    // /**Update the user's profile information.*/
    // public function update($request): RedirectResponse
    // {
    //     $request->user()->fill($request->validated());

    //     if ($request->user()->isDirty('email')) {
    //         $request->user()->email_verified_at = null;
    //     }

    //     $request->user()->save();

    //     return Redirect::route('profile.edit')->with('status', 'profile-updated');
    // }

    // /**Delete the user's account.*/
    // public function destroy(Request $request): RedirectResponse
    // {
    //     $request->validateWithBag('userDeletion', ['password' => ['required', 'current_password'],]);

    //     $user = $request->user();

    //     Auth::logout();

    //     $user->delete();

    //     $request->session()->invalidate();
    //     $request->session()->regenerateToken();

    //     return Redirect::to('/');
    // }
}
