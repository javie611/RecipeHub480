@extends('layouts.app')

@section('content')
<div class="container">
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
    <form action="{{ route('profile.update') }}" method="POST">
        @csrf
        <div>
            <label>Name:</label>
            <input type="text" name="name" value="{{ $user->name }}" required>
        </div>
        <div>
            <label>Username:</label>
            <input type="text" name="username" value="{{ $user->username }}" required>
        </div>
        <div>
            <label>Email:</label>
            <input type="email" name="email" value="{{ $user->email }}" required>
        </div>
        <button type="submit">Update Profile</button>
    </form>

    {{-- Change Password --}}
    <form action="{{ route('profile.change-password') }}" method="POST">
        @csrf
        <div>
            <label>Current Password:</label>
            <input type="password" name="current_password" required>
        </div>
        <div>
            <label>New Password:</label>
            <input type="password" name="new_password" required>
        </div>
        <div>
            <label>Confirm New Password:</label>
            <input type="password" name="new_password_confirmation" required>
        </div>
        <button type="submit">Change Password</button>
    </form>

    {{-- View Saved Lists --}}
    <a href="{{ route('profile.saved-lists') }}" class="btn btn-primary">View Saved Lists</a>
</div>
@endsection
