<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */

    public function index(Request $request): View
    {
        $stats = [
            ['label' => 'Models Owned', 'value' => '3', 'icon' => 'M21 7.5l-9-5.25L3 7.5m18 0-9 5.25m9-5.25v9l-9 5.25M3 7.5l9 5.25M3 7.5v9l9 5.25m0-9v9', 'color' => 'text-cyan-400', 'bg' => 'bg-cyan-400/10'],
            ['label' => 'Total Spent', 'value' => '$444', 'icon' => 'M12 6v12m-3-2.818.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z', 'color' => 'text-violet-400', 'bg' => 'bg-violet-400/10'],
            ['label' => 'Cart Items', 'value' => '3', 'icon' => 'M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z', 'color' => 'text-pink-400', 'bg' => 'bg-pink-400/10'],
            ['label' => 'Downloads', 'value' => '12', 'icon' => 'M9 8.25H7.5a2.25 2.25 0 0 0-2.25 2.25v9a2.25 2.25 0 0 0 2.25 2.25h9a2.25 2.25 0 0 0 2.25-2.25v-9a2.25 2.25 0 0 0-2.25-2.25H15M9 12l3 3m0 0 3-3m-3 3V2.25', 'color' => 'text-emerald-400', 'bg' => 'bg-emerald-400/10'],
        ];
        return view('dashboard', compact('stats'));
    }

    public function MyModels()
    {
        $thread = [
            ['name' => 'Neon Core X-1', 'date' => 'Jan 12, 2024', 'size' => '42.5 MB', 'format' => 'OBJ, FBX', 'tag' => 'High Poly', 'color' => 'text-cyan-400', 'img' => 'https://picsum.photos/id/1/600/600'],
            ['name' => 'Cyber-Augment v4', 'date' => 'Dec 28, 2023', 'size' => '128.0 MB', 'format' => 'BLEND, GLTF', 'tag' => 'Game Ready', 'color' => 'text-violet-400', 'img' => 'https://picsum.photos/id/2/600/600'],
            ['name' => 'Ethereal Pavilion', 'date' => 'Dec 15, 2023', 'size' => '215.2 MB', 'format' => '3DS, MAX', 'tag' => 'ArchViz', 'color' => 'text-pink-400', 'img' => 'https://picsum.photos/id/3/600/600'],
        ];
        return view('MyModels', compact('thread'));
    }

    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
