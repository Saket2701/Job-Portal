<?php

namespace App\Http\Controllers\Categories;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job\Job;
use App\Models\Category\Category;

class CategoriesController extends Controller
{
    public function singleCategory($name) {
        $jobs = Job::where('category', $name)
            ->take(5)
            ->orderBy('created_at', 'desc')
            ->get();
    
        return view('categories.single', compact('jobs','name'));
    }
    
    
}
