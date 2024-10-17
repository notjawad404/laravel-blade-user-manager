<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profiles</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <h1>User Profiles</h1>

    @if(session('success'))
        <p class="success-message">{{ session('success') }}</p>
    @endif

    <a href="{{ route('user_profiles.create') }}" class="button">Create New Profile</a>

    <table>
        <thead>
            <tr>
                <th>Username</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($profiles as $profile)
            <tr>
                <td>{{ $profile->username }}</td>
                <td>{{ $profile->email }}</td>
                <td>
                    <a href="{{ route('user_profiles.displayProfile', $profile->id) }}" class="button">View</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
