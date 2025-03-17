<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\StorageAllowance;
use Illuminate\Support\Collection;

class ProfileController extends Controller
{

    public function index(){
        $storageModel = StorageAllowance::storageInfo(Auth::user()->id);
        $storage = collect([
            "used" => $storageModel->storage_used /1000,
            "allowed" =>$storageModel->storage_allowed /1000,
            "leftPercent" => number_format($storageModel->storage_used/$storageModel->storage_allowed,2)*100,
            'remaning' => ($storageModel->storage_allowed - $storageModel->storage_used)/1000,
        ]);
        return view('profile.edit2', ['storage' => $storage]);
    }

    public function update(ProfileUpdateRequest $request): RedirectResponse{
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    public function destroy(Request $request): RedirectResponse{
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
