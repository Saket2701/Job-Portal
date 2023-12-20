<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Job\Application;
use App\Models\Job\JobSaved;
use File;
use Auth;

class UsersController extends Controller
{
    public function profile() {
        $profile = User::find(Auth::user()->id);
        return view('users.profile', compact('profile'));
    }
    
    public function applications() {
        $applications = Application::where('user_id', Auth::user()->id)->get();
        return view('users.applications', compact('applications'));
    }

    public function savedJobs() {
        $savedJobs = JobSaved::where('user_id', Auth::user()->id)->get();
        return view('users.saved_jobs', compact('savedJobs'));
    }

    public function editDetails() {
        $userDetails = User::find(Auth::user()->id);
        return view('users.editdetails', compact('userDetails'));
    }

    public function updateDetails(Request $request)
    {
        Request()->validate([
            "name" => "required|max:40",
            "job_title" => "required|max:40",
            "bio" => "required",
            "facebook" => "required|max:140",
            "twitter" => "required|max:140",
            "linkedin" => "required|max:140",
        ]);
        
        $userDetailsUpdate = User::find(Auth::user()->id);

        $userDetailsUpdate->update([
            "name" => $request->input('name'),
            "job_title" => $request->input('job_title'),
            "bio" => $request->input('bio'),
            "facebook" => $request->input('facebook'),
            "twitter" => $request->input('twitter'),
            "linkedin" => $request->input('linkedin'),
        ]);

        if ($userDetailsUpdate) {
            return redirect('/users/edit-details/')->with('success', 'Details updated successfully');
        } else {
            return redirect()->back()->with('error', 'Failed to update details');
        }
        
    }

    public function editCV()
    {
        return view('users.editcv');
    }
    
    public function updateCV(Request $request)
    {
        $oldCV = User::find(Auth::user()->id);
    
        if (File::exists(public_path('assets/cvs/' . $oldCV->cv))) {
            File::delete(public_path('assets/cvs/' . $oldCV->cv));
        }
    
        $destinationPath = 'assets/cvs/';
        $myCV = $request->file('cv')->getClientOriginalName();
        $request->file('cv')->move(public_path($destinationPath), $myCV);
    
        $oldCV->update([
            'cv' => $myCV,
        ]);
    
        return redirect('/users/profile')->with('update', 'CV updated successfully');
    }
    
    public function editProfilePicture()
    {
        $profile = User::find(Auth::user()->id);
        return view('users.editprofilepicture', compact('profile'));
    }

    public function updateProfilePicture(Request $request)
    {
        $oldProfile = User::find(Auth::user()->id);
    
        if ($oldProfile->image && $oldProfile->image !== 'default-pic.jpg' && File::exists(public_path('assets/images_users/' . $oldProfile->image))) {
            File::delete(public_path('assets/images_users/' . $oldProfile->image));
        }
    
        $destinationPath = 'assets/images_users/';
        $newProfilePicture = $request->file('profile_picture')->getClientOriginalName();
        $request->file('profile_picture')->move(public_path($destinationPath), $newProfilePicture);
    
        $oldProfile->update([
            'image' => $newProfilePicture,
        ]);
    
        return redirect('/users/profile')->with('update', 'Profile picture updated successfully');
    }
    
}
