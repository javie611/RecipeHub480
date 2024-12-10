@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@endpush

@section('content')
<div class="profile-container">
    <h1>Your Profile</h1>
    
    {{-- Display success/error messages --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Profile Information --}}
    <form action="{{ route('profile.update') }}" method="POST" class="form-section">
        @csrf
        <div class="form-group">
            <label for="name">Name:</label>
            <input id="name" type="text" name="name" value="{{ $user->name }}" required>
        </div>
        <div class="form-group">
            <label for="username">Username:</label>
            <input id="username" type="text" name="username" value="{{ $user->username }}" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input id="email" type="email" name="email" value="{{ $user->email }}" required>
        </div>
        <button type="submit" class="btn-submit">Update Profile</button>
    </form>

    {{-- Change Password --}}
    <form action="{{ route('profile.change-password') }}" method="POST" class="form-section">
        @csrf
        <div class="form-group">
            <label for="current_password">Current Password:</label>
            <input id="current_password" type="password" name="current_password" required>
        </div>
        <div class="form-group">
            <label for="new_password">New Password:</label>
            <input id="new_password" type="password" name="new_password" required>
        </div>
        <div class="form-group">
            <label for="new_password_confirmation">Confirm New Password:</label>
            <input id="new_password_confirmation" type="password" name="new_password_confirmation" required>
        </div>
        <button type="submit" class="btn-submit">Change Password</button>
    </form>
</div>

{{-- Centered "View Saved Lists" Button --}}
<div class="saved-lists-container">
    <a href="{{ route('profile.saved-lists') }}" class="btn-view-lists">View Saved Lists</a>
</div>
@endsection
