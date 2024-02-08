<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Implement your logic for the admin dashboard
    public function dashboard()
    {
        $this->authorize('viewAny', Job::class);

        // Implement your logic for the admin dashboard
        $jobCount = Job::count();
        $userCount = User::count();
        $applicationCount = JobApplication::count();

        return view('admin.dashboard', compact('jobCount', 'userCount', 'applicationCount'));
    }
}
