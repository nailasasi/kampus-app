<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Mata Kuliah</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-10">

<div class="max-w-3xl mx-auto bg-white p-6 rounded shadow">
    <h1 class="text-2xl font-bold mb-6">Tambah Mata Kuliah</h1>

    <form action="/mata-kuliah/store" method="POST" class="space-y-4">
        @csrf

        @include('mata_kuliah.form')

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">
            Simpan
        </button>

        <a href="/mata-kuliah" class="bg-gray-500 text-white px-4 py-2 rounded">
            Kembali
        </a>
    </form>
</div>

</body>
</html>