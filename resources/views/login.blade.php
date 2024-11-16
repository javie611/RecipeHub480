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
            <form action="{{ route('login') }}" method="POST">
    @csrf
    <div class="field input">
        <label for="username">Username</label>
        <input type="text" name="username" id="username" autocomplete="on" required>
    </div>

    <div class="field input">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" autocomplete="on" required>
    </div>

    <div class="field">
        <input type="submit" class="btn" name="submit" value="Login">
    </div>
    <div class="links">
            Don't have an account: <a href="{{ route('login') }}">Sign up Here</a>
</div>
</form>

        </div>
    </div>
</body>
</html>