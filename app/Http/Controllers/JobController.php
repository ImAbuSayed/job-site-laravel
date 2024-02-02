<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JobController extends Controller
{
    // In JobController.php
    public function index()
    {
        $jobs = Job::all();

        return view('jobs.index', compact('jobs'));
    }

    public function create()
    {
        return view('jobs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'deadline' => 'nullable|date',
        ]);

        auth()->user()->jobs()->create($request->all());

        return redirect()->route('jobs.index');
    }

    // Add other methods like edit, update, destroy
    public function edit(Job $job)
    {
        return view('jobs.edit', compact('job'));
    }

    public function update(Request $request, Job $job)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'deadline' => 'nullable|date',
        ]);

        $job->update($request->all());

        return redirect()->route('jobs.index')->with('success', 'Job updated successfully!');
    }

    public function destroy(Job $job)
    {
        return view('jobs.confirm-delete', compact('job'));
    }

    public function confirmDelete(Request $request, Job $job)
    {
        // Handle the confirmation and deletion here
        $job->delete();

        return redirect()->route('jobs.index');
    }
}
