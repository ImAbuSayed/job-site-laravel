<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\JobApplicationNotification;
class JobApplicationController extends Controller
{
    public function apply(Job $job)
    {
        $this->authorize('create', JobApplication::class);

        return view('job_applications.apply', compact('job'));
    }

    public function store(Request $request, Job $job)
    {
        $this->authorize('create', JobApplication::class);

        $request->validate([
            'resume' => 'required|mimes:pdf,doc,docx|max:2048',
        ]);

        $resumePath = $request->file('resume')->store('resumes');

        $jobApplication = $job->applications()->create([
            'user_id' => auth()->user()->id,
            'resume_path' => $resumePath,
        ]);

        // Notify the job poster
        $job->user->notify(new JobApplicationNotification($jobApplication));

        return redirect()->route('jobs.index')->with('success', 'Application submitted successfully!');
    }

    // Add other necessary methods like index, show, destroy

    public function confirmDelete(Request $request, Job $job)
    {
        // Handle the confirmation and deletion here
        $job->delete();

        return redirect()->route('jobs.index');
    }

    public function destroy(Job $job)
    {
        return view('jobs.confirm-delete', compact('job'));
    }
}
