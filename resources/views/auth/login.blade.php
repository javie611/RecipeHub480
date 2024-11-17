<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="container">
        <div class="box form-box">
            <header>Login</header>
            
            <!-- Form with dynamic action and CSRF protection -->
            <form action="{{ route('login') }}" method="POST">
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

                <!-- Username Field -->
                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" value="{{ old('email') }}" autocomplete="on" required>
                </div>

                <!-- Password Field -->
                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" autocomplete="on" required>
                </div>

                <!-- Submit Button -->
                <div class="field">
                    <input type="submit" class="btn" value="Login">
                </div>

                <!-- Links Section -->
                <div class="links">
                    Don't have an account? <a href="{{ route('register') }}">Sign up Here</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>

