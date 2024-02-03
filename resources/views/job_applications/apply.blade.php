<?php

@extends('layouts.app')

@section('content')
    <h2>Apply for {{ $job->title }}</h2>

    <form action="{{ route('job_applications.store', $job) }}" method="post" enctype="multipart/form-data">
        @csrf
        <label for="resume">Resume</label>
        <input type="file" name="resume" accept=".pdf,.doc,.docx" required>
        <br>
        <button type="submit">Apply</button>
    </form>
@endsection
