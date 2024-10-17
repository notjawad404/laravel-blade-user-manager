<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserProfile;

class UserProfileController extends Controller
{
    // List all profiles
    public function index()
    {
        $profiles = UserProfile::all();
        return view('user_profiles.index', compact('profiles'));
    }

    // Display the form for creating a new profile
    public function create()
    {
        return view('user_profiles.create');
    }

    // Save a new user profile
    public function saveProfile(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|unique:user_profiles',
            'email' => 'required|email|unique:user_profiles',
            'password' => 'required|min:8',
        ]);

        UserProfile::create($validated);

        return redirect()->route('user_profiles.index')->with('success', 'User profile created successfully!');
    }

    // Display a specific profile
    public function displayProfile(UserProfile $userProfile)
    {
        return view('user_profiles.display', compact('userProfile'));
    }

    // Edit a profile
    public function editProfile(UserProfile $userProfile)
    {
        return view('user_profiles.edit', compact('userProfile'));
    }

    // Update a profile
    public function updateProfile(Request $request, UserProfile $userProfile)
    {
        $validated = $request->validate([
            'username' => 'required|unique:user_profiles,username,' . $userProfile->id,
            'email' => 'required|email|unique:user_profiles,email,' . $userProfile->id,
            'password' => 'sometimes|min:8',
        ]);

        $userProfile->update($validated);

        return redirect()->route('user_profiles.index')->with('success', 'User profile updated successfully!');
    }

    // Delete a profile
    public function deleteProfile(UserProfile $userProfile)
    {
        $userProfile->delete();

        return redirect()->route('user_profiles.index')->with('success', 'User profile deleted successfully!');
    }
}
