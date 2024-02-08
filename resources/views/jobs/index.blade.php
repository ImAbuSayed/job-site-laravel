@extends('layouts.app')

@section('content')

    <div class="container">
        <h2 class="mb-3 text-center text-uppercase text-primary">Job Listings</h2>
        <hr>
        <div class="container text-center">
        <form class="form inline" action="{{ route('jobs.index') }}" method="get">
            <label for="search">Search:</label>
            <input type="text" name="search" value="{{ request('search') }}">
            <br>
            <label for="status">Status:</label>
            <select name="status">
                <option value="">All</option>
                <option value="open"{{ request('status') == 'open' ? ' selected' : '' }}>Open</option>
                <option value="closed"{{ request('status') == 'closed' ? ' selected' : '' }}>Closed</option>
                <option value="pending_approval"{{ request('status') == 'pending_approval' ? ' selected' : '' }}>Pending Approval</option>
            </select>
            <br>
            <button class="btn btn-primary" type="submit">Search</button>
        </form>
        </div>
        @foreach ($jobs as $job)
            <div class="card job-card mb-3">
                <h3 class="card-title">{{ $job->title }}</h3>
                <p class="card-text">{{ $job->description }}</p>
                <p class="card-text">Status: {{ $job->status }}</p>
                <p class="card-text" id="deadline-countdown">Deadline: {{ $job->deadline }}</p>
                <p class="card-text">Location: {{ $job->location }}</p>
                <p class="card-text">Job Type: {{ $job->job_type }}</p>
                <p class="card-text">Posted By: {{ $job->user->name }}</p>

            </div>
        @endforeach
        <p class="text-center">{{ $jobs->links() }}</p>
        @endsection
    </div>
