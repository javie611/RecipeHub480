<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="container">
        <div class="box form-box">
            <header>Sign Up</header>
            
            <!-- Form with dynamic action and CSRF protection -->
            <form action="{{ route('register') }}" method="POST">
                @csrf

                <!-- Display Validation Errors -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="field input">
    <label for="name">Name</label>
    <input type="text" name="name" id="name" value="{{ old('name') }}" autocomplete="on" required>
</div>

                <!-- Username Field -->
                <div class="field input">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" value="{{ old('username') }}" autocomplete="on" required>
                </div>

                <!-- Email Field -->
                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" value="{{ old('email') }}" autocomplete="on" required>
                </div>

                <!-- Password Field -->
                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" autocomplete="on" required>
                </div>

                <div class="field input">
    <label for="password_confirmation">Confirm Password</label>
    <input type="password" name="password_confirmation" id="password_confirmation" autocomplete="on" required>
</div>

                <!-- Submit Button -->
                <div class="field">
                    <input type="submit" class="btn" value="Register">
                </div>

                <!-- Links Section -->
                <div class="links">
                    Already a member? <a href="{{ route('login') }}">Login Here</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
