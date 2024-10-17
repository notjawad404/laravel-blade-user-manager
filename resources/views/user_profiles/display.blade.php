<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Profile</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

    <div class="container">
        <a href="/" class="button back-button">Back</a>
        <h1>Profile Details</h1>

        <div class="profile-details">
            <p><strong>Username:</strong> {{ $userProfile->username }}</p>
            <p><strong>Email:</strong> {{ $userProfile->email }}</p>
            <p><strong>Password:</strong> {{ $userProfile->password }}</p>
        </div>

        <div class="profile-actions">
            <a href="{{ route('user_profiles.editProfile', $userProfile->id) }}" class="button edit-button">Edit Profile</a>

            <form action="{{ route('user_profiles.deleteProfile', $userProfile->id) }}" method="POST" class="delete-form">
                @csrf
                @method('DELETE')
                <button type="submit" class="button delete-button">Delete Profile</button>
            </form>
        </div>
    </div>

</body>
</html>
