<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa</title>
    <!-- Menghubungkan Tailwind via CDN agar desain langsung rapi -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* CSS tambahan untuk memastikan foto tidak meledak ukurannya */
        .img-profile {
            width: 50px;
            height: 50px;
            object-fit: cover;
            border-radius: 50%;
        }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 12px; text-align: left; border-bottom: 1px solid #ddd; }
    </style>
</head>
<body class="bg-gray-100 p-10">

    <div class="max-w-6xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Daftar Mahasiswa</h2>
            <a href="{{ route('mahasiswa.create') }}" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-md transition">
                + Tambah Mahasiswa
            </a>
        </div>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-x-auto">
            <table class="min-w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="text-gray-600 uppercase text-sm">Foto</th>
                        <th class="text-gray-600 uppercase text-sm">NIM</th>
                        <th class="text-gray-600 uppercase text-sm">Nama</th>
                        <th class="text-gray-600 uppercase text-sm">Prodi</th>
                        <th class="text-gray-600 uppercase text-sm text-center">Angkatan</th>
                        <th class="text-gray-600 uppercase text-sm text-center">IPK</th>
                        <th class="text-gray-600 uppercase text-sm text-center">Status</th>
                        <th class="text-gray-600 uppercase text-sm text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($mahasiswa as $mhs)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="py-3">
                            @if($mhs->foto)
                                <img src="{{ asset('storage/' . $mhs->foto) }}" class="img-profile border shadow-sm">
                            @else
                                <div class="w-12 h-12 bg-gray-200 rounded-full flex items-center justify-center text-gray-400 text-xs">No Pic</div>
                            @endif
                        </td>
                        <td class="font-semibold text-gray-700">{{ $mhs->NIM }}</td>
                        <td class="text-gray-600">{{ $mhs->nama }}</td>
                        <td class="text-gray-600">{{ $mhs->jurusan }}</td>
                        <td class="text-center text-gray-600">{{ $mhs->angkatan }}</td>
                        <td class="text-center font-bold text-blue-600">{{ number_format($mhs->ipk, 2) }}</td>
                        <td class="text-center">
                            <span class="px-3 py-1 rounded-full text-xs font-bold {{ $mhs->status == 'Aktif' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                {{ $mhs->status }}
                            </span>
                        </td>
                        <td class="text-center">
                            <div class="flex justify-center gap-2">
                                <a href="{{ route('mahasiswa.edit', $mhs->id) }}" class="text-yellow-500 hover:text-yellow-700 font-medium">Edit</a>
                                <form action="{{ route('mahasiswa.destroy', $mhs->id) }}" method="POST" onsubmit="return confirm('Yakin hapus data ini?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700 font-medium">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>