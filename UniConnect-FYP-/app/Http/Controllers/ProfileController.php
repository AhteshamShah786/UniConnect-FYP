<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile.
     */
    public function show(Request $request): View
    {
        return view('profile.show', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Display the user's profile form.
     */
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
        try {
            $request->user()->fill($request->validated());

            if ($request->user()->isDirty('email')) {
                $request->user()->email_verified_at = null;
            }

            $request->user()->save();

            return Redirect::route('profile.edit')->with('status', 'profile-updated');
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Profile update error: ' . $e->getMessage());
            return Redirect::route('profile.edit')->with('error', 'Failed to update profile.');
        }
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        try {
            $request->validateWithBag('userDeletion', [
                'password' => ['required', 'current_password'],
            ]);

            $user = $request->user();

            Auth::logout();

            $user->delete();

            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return Redirect::to('/')->with('status', 'Account deleted successfully.');
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Account deletion error: ' . $e->getMessage());
            return Redirect::route('profile.edit')->with('error', 'Failed to delete account.');
        }
    }

    /**
     * Upload a profile photo.
     */
    public function uploadPhoto(Request $request): RedirectResponse
    {
        try {
            $request->validate([
                'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $user = $request->user();
            $profile = $user->profile;

            if (!$profile) {
                return Redirect::route('profile.edit')->with('error', 'Please complete your profile first.');
            }

            // Delete old photo if exists
            if ($profile->profile_picture && Storage::disk('public')->exists($profile->profile_picture)) {
                Storage::disk('public')->delete($profile->profile_picture);
            }

            // Store new photo
            $path = $request->file('photo')->store('profile-photos', 'public');
            $profile->update(['profile_picture' => $path]);

            return Redirect::route('profile.edit')->with('status', 'Photo uploaded successfully.');
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Photo upload error: ' . $e->getMessage());
            return Redirect::route('profile.edit')->with('error', 'Failed to upload photo.');
        }
    }

    /**
     * Download a file.
     */
    public function downloadFile(Request $request, string $file): Response
    {
        try {
            $user = $request->user();
            
            if (!$user) {
                abort(401, 'Unauthorized');
            }

            // Validate file path to prevent directory traversal
            $filePath = 'downloads/' . basename($file);
            
            if (!Storage::disk('public')->exists($filePath)) {
                abort(404, 'File not found');
            }

            // Check if user has permission (file belongs to user)
            $fileName = basename($file);
            if (!str_starts_with($fileName, $user->id . '_')) {
                abort(403, 'Forbidden');
            }

            return Storage::disk('public')->download($filePath);
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('File download error: ' . $e->getMessage());
            abort(500, 'Error downloading file');
        }
    }
}
