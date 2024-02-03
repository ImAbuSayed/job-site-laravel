<?php

    // Implement your logic for the admin dashboard

@extends('layouts.app')

@section('content')
    <h2>Admin Dashboard</h2>

    <div>
        <h3>Statistics</h3>
        <p>Total Jobs: {{ $jobCount }}</p>
        <p>Total Users: {{ $userCount }}</p>
        <p>Total Applications: {{ $applicationCount }}</p>
    </div>
@endsection
