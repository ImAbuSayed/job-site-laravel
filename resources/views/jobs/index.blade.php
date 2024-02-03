@extends('layouts.app')

@section('content')
    <h2>Job Listings</h2>

    @foreach ($jobs as $job)
        <div>
            <h3>{{ $job->title }}</h3>
            <p>{{ $job->description }}</p>
            <p>Status: {{ $job->status }}</p>
            <p>Deadline: {{ $job->deadline ? $job->deadline->format('Y-m-d') : 'N/A' }}</p>
        </div>
        <hr>
    @endforeach
@endsection
