<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Notifications\JobRejectedNotification;

class JobController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function rejectApplication(JobApplication $application)
    {
        // Update the application status
        $application->update(['status' => 'rejected']);

        // Notify the job seeker
        $application->user->notify(new JobRejectedNotification($application->job));

        return redirect()->back()->with('success', 'Application rejected successfully.');
    }

    // In JobController.php
    public function index(Request $request)
    {
        if($request){
            $jobs = Job::when($request->filled('search'), function ($query) use ($request) {
                $query->where('title', 'like', '%' . $request->input('search') . '%')
                    ->orWhere('description', 'like', '%' . $request->input('search') . '%');
            })
                ->when($request->filled('status'), function ($query) use ($request) {
                    $query->where('status', $request->input('status'));
                })
                ->paginate(3);
        } else {
            $jobs = Job::all();
        }

        return view('jobs.index', compact('jobs'));
    }

    public function create()
    {
        $this->authorize('create', Job::class);

        return view('jobs.create');
    }

    public function store(Request $request)
    {
        $this->authorize('create', Job::class);

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'deadline' => 'nullable|date',
            'status' => 'nullable',
            'featured' => 'nullable',
            'skills' => 'nullable',
            'experience_level' => 'nullable',
            'job_type' => 'nullable',
            'remote_work' => 'nullable',
            'requirements' => 'nullable',
            'responsibilities' => 'nullable',
            'benefits' => 'nullable',
            'company_name' => 'required',
            'category' => 'required',
            'location' => 'required',
            'salary' => 'required|numeric',
            'company_email' => 'required|email',
            'company_website' => 'nullable|url',
        ]);

        auth()->user()->jobs()->create($request->all());

        return redirect()->route('jobs.index');
    }

    // Add other methods like edit, update, destroy
    public function edit(Job $job)
    {
        $this->authorize('update', $job);

        return view('jobs.edit', compact('job'));
    }

    public function update(Request $request, Job $job)
    {
        $this->authorize('update', $job);

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'deadline' => 'nullable|date',
            'status' => 'nullable',
            'featured' => 'nullable',
            'skills' => 'nullable',
            'experience_level' => 'nullable',
            'job_type' => 'nullable',
            'remote_work' => 'nullable',
            'requirements' => 'nullable',
            'responsibilities' => 'nullable',
            'benefits' => 'nullable',
            'company_name' => 'required',
            'category' => 'required',
            'location' => 'required',
            'salary' => 'required|numeric',
            'company_email' => 'required|email',
            'company_website' => 'nullable|url',
        ]);

        $job->update($request->all());

        return redirect()->route('jobs.index');
    }

    public function destroy(Job $job)
    {
        $this->authorize('delete', $job);

        $job->delete();

        return redirect()->route('jobs.index');
    }

    public function confirmDelete(Request $request, Job $job)
    {
        // Handle the confirmation and deletion here
        $job->delete();

        return redirect()->route('jobs.index');
    }

}
