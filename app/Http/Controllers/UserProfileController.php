<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserProfile;

class UserProfileController extends Controller
{
    public function index()
    {
        $profiles = UserProfile::all();
        return view('user_profiles.index', conpact('profiles'));
    }

    // Display the form for creating a new user profile
    public function create()
    {
        return view('user_profiles.create');
    }

    // Add a new user profile
    public function saveProfile(Request $request){
        $validated = $request->validate([
            'username' => 'required|unique:user_profiles',
            'email' => 'required|unique:user_profiles',
            'password' => 'required',
            //'password_confirmation' => 'required|same:password'
        ]);

        userProile::createProfile($validated);

        return redirect('user_profiles.index')->with('success', 'User profile created successfully!');
    }

    // Display a specific profile
    public function displayprofile(UserProfile $userProfile)
    {
        return view('user_profiles.display', conpact('userProfile'));
    }

    // Edit a profile
    public function editProfile(UserProfile $userProfile){
        return view('user_profiles.edit', conpact('userProfile'));
    }

    // Update a profile
    public function updateProfile(UserProfile $userProfile, Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|unique:user_profiles'. $userProfile->id,
            'email' => 'required|unique:user_profiles'. $userProfile->id,
            'password' => 'required',
            //'password_confirmation' => 'required|same:password'
        ]);

        $userProfile->updateProfile($validated);

        return redirect('user_profiles.index')->with('success', 'User profile updated successfully!');
    }

    // Delete a profile
    public function deleteProfile(UserProfile $userProfile)
    {
        $userProfile->delete();

        return redirect('user_profiles.index')->with('success', 'User profile deleted successfully!');
    }
}
