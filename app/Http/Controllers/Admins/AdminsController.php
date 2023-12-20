<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\File;
use App\Models\Admin\Admin;
use App\Models\Job\Job;
use App\Models\Job\Application;
use App\Models\Category\Category;

class AdminsController extends Controller
{
    public function viewLogin()
    {
        return view("admins.view-login");
    }

    public function checkLogin(Request $request)
    {
        $remember_me = $request->has('remember_me') ? true : false;

        if (auth()->guard('admin')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')], $remember_me)) {
            return redirect()->route('admins.dashboard');
        }

        return redirect()->back()->with(['error' => 'Error logging in']);
    }

    public function index() {
        $jobsCount = Job::select()->count();
        $categoriesCount = Category::select()->count();
        $adminsCount = Admin::select()->count();
        $applicationsCount = Application::select()->count();
    
        return view("admins.index", compact('jobsCount', 'categoriesCount', 'adminsCount', 'applicationsCount'));
    }
    
    public function admins() {
        $admins = Admin::all();
        return view('admins.all-admins', compact('admins'));
    }

    public function createAdmins()
    {
        return view('admins.create-admins');
    }

    public function storeAdmins(Request $request) {

        $request->validate([
            'name' => 'required|max:40',
            'email' => 'required|max:40',
            'password' => 'required',
        ]);
        
        $createAdmins = Admin::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        if ($createAdmins) {
            return redirect('/admin/all-admins/')->with('create', 'Admin created successfully');
        } 
        else {
            return redirect()->back()->with('error', 'Failed to create Admin');
        }
    }

    public function displayCategories() {
        $categories = Category::all();
        return view('admins.display-categories', compact('categories'));
    }

    public function createCategories() {
        return view('admins.create-categories');
    }


    public function storeCategories(Request $request) {
        $request->validate([
            'name' => 'required|max:40',
        ]);
    
        $createCategory = Category::create([
            'name' => $request->input('name'),
        ]);
    
        if ($createCategory) {
            return redirect()->route('display.categories')->with('create', 'Category created successfully');
        } 
        else {
            return redirect()->back()->with('error', 'Failed to create category');
        }
    }


    public function editCategories($id) {
        $category = Category::find($id);
        return view("admins.edit-categories", compact('category'));
    }
    
    public function updateCategories($id)
    {
        $request = request();

        $request->validate([
            "name" => "required|max:40",
        ]);

        $categoryToUpdate = Category::find($id);

        if (!$categoryToUpdate) {
            return redirect()->back()->with('error', 'Category not found');
        }

        $categoryToUpdate->update([
            'name' => $request->input('name'),
        ]);

        return redirect()->route('display.categories')->with('update', 'Category updated successfully');
    }

    public function deleteCategories($id)
    {
        $deleteCategory = Category::find($id);
    
        if (!$deleteCategory) {
            return redirect()->back()->with('error', 'Category not found');
        }
    
        $deleteCategory->delete();
    
        return redirect('/admin/display-categories/')->with('delete', 'Category deleted successfully');
    }

    public function allJobs()
    {
        $jobs = Job::all();
        return view('admins.all-jobs', compact('jobs'));
    }

    public function createJobs()
    {
        $categories = Category::all();
        return view('admins.create-jobs', compact('categories'));
    }

    public function storeJobs(Request $request)
    {
        $request->validate([
            'job_title' => 'required|string',
            'job_region' => 'required|string',
            'company' => 'required|string',
            'job_type' => 'required|string',
            'vacancy' => 'required|integer',
            'experience' => 'required|string',
            'salary' => 'required|string',
            'gender' => 'required|string',
            'application_deadline' => 'required|date',
            'job_description' => 'required|string',
            'responsibilities' => 'required|string',
            'education_experience' => 'required|string',
            'other_benefits' => 'required|string',
            'category' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time() . '.' . $request->image->extension();
        $destinationPath = public_path('assets/images');
        $request->image->move($destinationPath, $imageName);

        $createJobs = Job::create([
            'job_title' => $request->input('job_title'),
            'job_region' => $request->input('job_region'),
            'company' => $request->input('company'),
            'job_type' => $request->input('job_type'),
            'vacancy' => $request->input('vacancy'),
            'experience' => $request->input('experience'),
            'salary' => $request->input('salary'),
            'gender' => $request->input('gender'),
            'application_deadline' => $request->input('application_deadline'),
            'job_description' => $request->input('job_description'),
            'responsibilities' => $request->input('responsibilities'),
            'education_experience' => $request->input('education_experience'),
            'other_benefits' => $request->input('other_benefits'),
            'category' => $request->input('category'),
            'image' => $imageName,
        ]);

        if ($createJobs) {
            return redirect('/admin/display-jobs/')->with('create', 'Job created successfully');
        } 
        else {
            return redirect()->back()->with('error', 'Failed to create Admin');
        }        
    }

    public function deleteJobs($id)
    {
        $deleteJob = Job::find($id);
    
        if ($deleteJob) {

            if (File::exists(public_path('assets/images/' . $deleteJob->image))) {
                File::delete(public_path('assets/images/' . $deleteJob->image));
            }
            $deleteJob->delete();
    
            return redirect('/admin/display-jobs/')->with('delete', 'Category deleted successfully');
        } 
        
        else {
            return redirect()->back()->with('error', 'Job not found');
        }
    }

    public function displayApps()
    {
        $displayApps = Application::all();
        return view('admins.all-apps', compact('displayApps'));
    }

    public function deleteApps($id)
    {
        $deleteApp = Application::find($id);
    
        if (!$deleteApp) {
            return redirect()->back()->with('error', 'Category not found');
        }
    
        $deleteApp->delete();
    
        return redirect('/admin/display-apps/')->with('delete', 'Application deleted successfully');
    }

}
