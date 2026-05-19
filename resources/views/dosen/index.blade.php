<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Dosen</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-10">

<div class="max-w-7xl mx-auto">
    <h1 class="text-3xl font-bold mb-6 text-center">Kelola Data Dosen</h1>

    @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-4">
        <a href="/dosen/create" class="bg-blue-600 text-white px-4 py-2 rounded">
            Tambah Dosen
        </a>

        <a href="/dashboard" class="bg-gray-500 text-white px-4 py-2 rounded">
            Kembali Dashboard
        </a>
    </div>

    @php
        function sortLinkDosen($label, $field, $sort, $direction) {
            $newDirection = ($sort === $field && $direction === 'asc') ? 'desc' : 'asc';
            $arrow = '';

            if ($sort === $field) {
                $arrow = $direction === 'asc' ? ' ↑' : ' ↓';
            }

            return '<a href="/dosen?sort=' . $field . '&direction=' . $newDirection . '">' . $label . $arrow . '</a>';
        }
    @endphp

    <div class="bg-white p-6 rounded shadow overflow-x-auto">
        <table class="min-w-full border border-gray-300">
            <thead class="bg-blue-600 text-white">
                <tr>
                    <th class="px-4 py-2 border">{!! sortLinkDosen('ID', 'id', $sort, $direction) !!}</th>
                    <th class="px-4 py-2 border">Foto</th>
                    <th class="px-4 py-2 border">{!! sortLinkDosen('NIDN', 'nidn', $sort, $direction) !!}</th>
                    <th class="px-4 py-2 border">{!! sortLinkDosen('Nama', 'nama', $sort, $direction) !!}</th>
                    <th class="px-4 py-2 border">{!! sortLinkDosen('Email', 'email', $sort, $direction) !!}</th>
                    <th class="px-4 py-2 border">{!! sortLinkDosen('No HP', 'no_hp', $sort, $direction) !!}</th>
                    <th class="px-4 py-2 border">{!! sortLinkDosen('Fakultas', 'fakultas', $sort, $direction) !!}</th>
                    <th class="px-4 py-2 border">{!! sortLinkDosen('Jabatan', 'jabatan', $sort, $direction) !!}</th>
                    <th class="px-4 py-2 border">{!! sortLinkDosen('Status', 'status_dosen', $sort, $direction) !!}</th>
                    <th class="px-4 py-2 border">Alamat</th>
                    <th class="px-4 py-2 border">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse($dosen as $d)
                    <tr class="text-center hover:bg-gray-100">
                        <td class="px-4 py-2 border">{{ $d->id }}</td>

                        <td class="px-4 py-2 border">
                            @if($d->foto)
                                <img src="{{ asset('uploads/dosen/' . $d->foto) }}"
                                     class="w-16 h-16 object-cover rounded mx-auto border">
                            @else
                                -
                            @endif
                        </td>

                        <td class="px-4 py-2 border">{{ $d->nidn }}</td>
                        <td class="px-4 py-2 border">{{ $d->nama }}</td>
                        <td class="px-4 py-2 border">{{ $d->email }}</td>
                        <td class="px-4 py-2 border">{{ $d->no_hp }}</td>
                        <td class="px-4 py-2 border">{{ $d->fakultas }}</td>
                        <td class="px-4 py-2 border">{{ $d->jabatan }}</td>
                        <td class="px-4 py-2 border">{{ $d->status_dosen }}</td>
                        <td class="px-4 py-2 border">{{ $d->alamat }}</td>

                        <td class="px-4 py-2 border">
                            <a href="/dosen/{{ $d->id }}/edit"
                               class="bg-yellow-500 text-white px-3 py-1 rounded inline-block mb-1">
                                Edit
                            </a>

                            <form action="/dosen/{{ $d->id }}" method="POST"
                                  class="inline"
                                  onsubmit="return confirm('Yakin ingin menghapus data dosen ini?')">
                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="bg-red-600 text-white px-3 py-1 rounded">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="11" class="text-center px-4 py-3 border">
                            Belum ada data dosen
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

</body>
</html>