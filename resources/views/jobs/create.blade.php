<?php

@extends('layouts.app')

@section('content')
    <h2>Create Job Listing</h2>

    <form action="{{ route('jobs.store') }}" method="post">
        @csrf
        <label for="title">Title</label>
        <input type="text" name="title" required>
        <br>
        <label for="description">Description</label>
        <textarea name="description" required></textarea>
        <br>
        <label for="requirements">Requirements</label>
        <textarea name="requirements"></textarea>
        <br>
        <label for="benefits">Benefits</label>
        <textarea name="benefits"></textarea>
        <br>
        <label for="skills">Skills</label>
        <textarea name="skills"></textarea>
        <br>
        <label for="experience_level">Experience Level</label>
        <select name="experience_level">
            <option value="fresher">Fresher</option>
            <option value="beginner">Beginner ( 0-2 years )</option>
            <option value="intermediate">Intermediate ( 2-5 years )</option>
            <option value="expert">Expert ( 5+ years )</option>
        </select>
        <br>
        <label for="job_type">Job Type</label>
        <select name="job_type">
            <option value="full-time">Full Time</option>
            <option value="part-time">Part Time</option>
            <option value="contract">Contract</option>
            <option value="internship">Internship</option>
        </select>
        <br>
        <label for="remote_work">Remote Work</label>
        <select name="remote_work">
            <option value=1>Yes</option>
            <option value=0>No</option>
        </select>
        <br>
        <label for="salary">Salary</label>
        <input type="text" name="salary">
        <br>
        <label for="company_name">Company</label>
        <input type="text" name="company_name">
        <br>
        <label for="location">Location</label>
        <input type="text" name="location">
        <br>
        <label for="company_email">Contact</label>
        <input type="text" name="company_email">
        <br>
        <label for="company_website">URL</label>
        <input type="text" name="company_website">
        <br>
        <label for="deadline">Deadline</label>
        <input type="date" name="deadline">
        <br>
        <label for="status">Status</label>
        <select name="status">
            <option value="open">Open</option>
            <option value="closed">Closed</option>
        </select>
        <button type="submit">Create Job</button>
    </form>
@endsection
