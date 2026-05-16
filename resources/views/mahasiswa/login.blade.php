<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Sistem</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
        <h2 class="text-2xl font-bold text-center mb-6">Login Sistem</h2>

        @if(session('error'))
            <div class="mb-4 p-3 bg-red-100 text-red-700 rounded">
                {{ session('error') }}
            </div>
        @endif

        <form action="/login" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="block text-sm font-medium">Username</label>
                <input type="text" name="username" class="w-full border rounded px-3 py-2 mt-1" required>
            </div>

            <div>
                <label class="block text-sm font-medium">Password</label>
                <input type="password" name="password" class="w-full border rounded px-3 py-2 mt-1" required>
            </div>

            <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700">
                Login
            </button>
        </form>
    </div>

</body>
</html>