<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Home</title>
</head>
<body>
    <div class="nav">
        <div class="logo">
            <p><a href="{{ route('home') }}">Logo</a></p>
        </div>

        <div class="right-links">
            <a href="#">Change Profile</a>
            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <button class="btn">Log Out</button>
            </form>
        </div>
    </div>

    <main>
        <div class="main-box top">
            <div class="top">
                <div class="box">
                    <p>Hi <b>{{ Auth::user()->name }}</b>, this is a basic home page.</p>
                </div>
                <div class="box">
                    <p>Your email is <b>{{ Auth::user()->email }}</b></p>
                </div>
                <div class="box">
                    <p>Your password is <b>********</b> (not displayed for security reasons).</p>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
