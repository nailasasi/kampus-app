<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Mata Kuliah</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-10">

<div class="max-w-3xl mx-auto bg-white p-6 rounded shadow">
    <h1 class="text-2xl font-bold mb-6">Edit Mata Kuliah</h1>

    <form action="/mata-kuliah/{{ $mataKuliah->id }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        @include('mata_kuliah.form')

        <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded">
            Update
        </button>

        <a href="/mata-kuliah" class="bg-gray-500 text-white px-4 py-2 rounded">
            Kembali
        </a>
    </form>
</div>

</body>
</html>