<!-- resources/views/test.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Page</title>
</head>
<body>
    <h1>Hello, welcome to the Test Page!</h1>
    <p>This is a simple Blade view.</p>
    <a href="{{ route('dashboard') }}">
        <button type="button">Back to Dashboard</button>
    </a>
</body>
</html>