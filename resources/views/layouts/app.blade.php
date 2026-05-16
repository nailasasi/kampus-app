{{-- resources/views/layouts/app.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIAKAD MINI</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <nav class="bg-blue-600 p-4 text-white shadow-md mb-6">
        <div class="container mx-auto">
            <a href="{{ route('mahasiswa.index') }}" class="font-bold text-lg">SIAKAD</a>
        </div>
    </nav>

    <div class="container mx-auto px-4">
        @yield('content') {{-- Tempat isi konten dari index/create/edit --}}
    </div>
</body>
</html>