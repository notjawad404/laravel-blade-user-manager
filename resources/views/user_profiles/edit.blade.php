<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User Profile</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

    <div class="form-container">
        <h2>Edit User Profile</h2>

        @if ($errors->any())
            <div class="error-message">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('user_profiles.updateProfile', $userProfile->id) }}" method="POST">
            @csrf
            @method('PUT')
            <label for="username">Username:</label>
            <input type="text" name="username" value="{{ old('username', $userProfile->username) }}" required>

            <label for="email">Email:</label>
            <input type="email" name="email" value="{{ old('email', $userProfile->email) }}" required>

            <label for="password">Password:</label>
            <input type="password" name="password" required>

            <button type="submit">Update Profile</button>
            <a href="{{ route('user_profiles.index') }}" class="button cancel-button">Cancel</a>
        </form>
    </div>

</body>
</html>
