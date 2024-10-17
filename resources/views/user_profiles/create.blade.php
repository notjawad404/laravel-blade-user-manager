<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User Profile</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

    <div class="form-container">
        <h2>Create User Profile</h2>

        @if ($errors->any())
            <div class="error-message">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('user_profiles.saveProfile') }}" method="POST">
            @csrf
            <label for="username">Username:</label>
            <input type="text" name="username" value="{{ old('username') }}" required>

            <label for="email">Email:</label>
            <input type="email" name="email" value="{{ old('email') }}" required>

            <label for="password">Password:</label>
            <input type="password" name="password" required>

            <button type="submit">Create Profile</button>
            <a href="{{ route('user_profiles.index') }}" class="button cancel-button">Cancel</a>
        </form>
    </div>

</body>
</html>
