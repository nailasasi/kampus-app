<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-10">

    <div class="max-w-4xl mx-auto bg-white p-8 rounded-lg shadow">
        <h1 class="text-2xl font-bold mb-2">Dashboard Administrator</h1>
        <p class="mb-6">
            Selamat datang, <strong>{{ session('nama_lengkap') }}</strong>
        </p>

        <hr class="mb-4">

        <h2 class="text-lg font-semibold mb-2">Menu</h2>
        <ul class="list-disc pl-6 mb-6">
            <li>
                <a href="/mahasiswa" class="text-blue-600 hover:underline">
                    Kelola Data Mahasiswa
                </a>
            </li>
            <li>
    <a href="/dosen" class="text-blue-600 hover:underline">
        Kelola Data Dosen
    </a>
</li>
<li>
    <a href="/mata-kuliah" class="text-blue-600 hover:underline">
        Kelola Mata Kuliah
    </a>
</li>
            <li>Pengaturan Akun</li>
        </ul>

        <a href="/logout" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
            Logout
        </a>
    </div>

</body>
</html>