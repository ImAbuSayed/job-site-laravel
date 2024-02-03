<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JobApplicationController extends Controller
{
    public function apply(Job $job)
    {
        return view('job_applications.apply', compact('job'));
    }

    public function store(Request $request, Job $job)
    {
        $request->validate([
            'resume' => 'required|mimes:pdf,doc,docx|max:2048',
        ]);

        $resumePath = $request->file('resume')->store('resumes');

        $job->applications()->create([
            'user_id' => auth()->user()->id,
            'resume_path' => $resumePath,
        ]);

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
