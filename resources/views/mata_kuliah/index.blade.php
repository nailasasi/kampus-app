<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Mata Kuliah</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-10">

<div class="max-w-6xl mx-auto">
    <h1 class="text-3xl font-bold mb-6 text-center">Kelola Mata Kuliah</h1>

    @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-4">
        <a href="/mata-kuliah/create" class="bg-blue-600 text-white px-4 py-2 rounded">
            Tambah Mata Kuliah
        </a>

        <a href="/dashboard" class="bg-gray-500 text-white px-4 py-2 rounded">
            Kembali Dashboard
        </a>
    </div>

    <div class="bg-white p-6 rounded shadow">
        <table class="min-w-full border border-gray-300">
            <thead class="bg-blue-600 text-white">
                <tr>
                    <th class="px-4 py-2 border">ID</th>
                    <th class="px-4 py-2 border">Kode MK</th>
                    <th class="px-4 py-2 border">Nama Mata Kuliah</th>
                    <th class="px-4 py-2 border">SKS</th>
                    <th class="px-4 py-2 border">Semester</th>
                    <th class="px-4 py-2 border">Dosen Pengampu</th>
                    <th class="px-4 py-2 border">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($mataKuliah as $mk)
                    <tr class="text-center hover:bg-gray-100">
                        <td class="px-4 py-2 border">{{ $mk->id }}</td>
                        <td class="px-4 py-2 border">{{ $mk->kode_mk }}</td>
                        <td class="px-4 py-2 border">{{ $mk->nama_mk }}</td>
                        <td class="px-4 py-2 border">{{ $mk->sks }}</td>
                        <td class="px-4 py-2 border">{{ $mk->semester }}</td>
                        <td class="px-4 py-2 border">{{ $mk->dosen->nama ?? '-' }}</td>
                        <td class="px-4 py-2 border">
                            <a href="/mata-kuliah/{{ $mk->id }}/edit" class="bg-yellow-500 text-white px-3 py-1 rounded">
                                Edit
                            </a>

                            <form action="/mata-kuliah/{{ $mk->id }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus mata kuliah ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center px-4 py-3 border">
                            Belum ada data mata kuliah
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

</body>
</html>