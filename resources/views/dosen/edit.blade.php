<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Dosen</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 py-10">

<div class="max-w-5xl mx-auto bg-white p-8 rounded shadow">
    <h1 class="text-4xl font-bold mb-8">Edit Data Dosen</h1>

    <form action="/dosen/{{ $dosen->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @include('dosen.form')

        <div class="mt-8 border-t pt-6">
            <button type="submit"
                    class="bg-yellow-500 hover:bg-yellow-600 text-white px-6 py-3 rounded">
                Update Data
            </button>

            <a href="/dosen"
               class="bg-gray-300 hover:bg-gray-400 px-6 py-3 rounded ml-2">
                Batal
            </a>
        </div>
    </form>
</div>

</body>
</html>