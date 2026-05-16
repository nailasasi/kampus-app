<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswa = Mahasiswa::all();
        return view('mahasiswa.index', compact('mahasiswa'));
    }

    public function create()
    {
        return view('mahasiswa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required|string|min:10|max:20|unique:mahasiswa,NIM',
            'nama' => 'required',
            'prodi' => 'required',
            'angkatan' => 'required|numeric',
            'ipk' => 'required|numeric|between:0,4.00',
            'status' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $path_foto = null;
        if ($request->hasFile('foto')) {
            $path_foto = $request->file('foto')->store('mahasiswa', 'public');
        }

        Mahasiswa::create([
            'NIM' => (string) $request->nim,
            'nama' => $request->nama,
            'jurusan' => $request->prodi,
            'angkatan' => $request->angkatan,
            'ipk' => $request->ipk,
            'status' => $request->status,
            'foto' => $path_foto,
        ]);

        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil ditambahkan!');
    }

    public function edit(Mahasiswa $mahasiswa)
    {
        return view('mahasiswa.edit', compact('mahasiswa'));
    }

    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        // 1. Tambahkan validasi untuk kolom baru agar tidak kosong
        $request->validate([
            'nim'      => 'required|unique:mahasiswa,NIM,' . $mahasiswa->id,
            'nama'     => 'required',
            'prodi'    => 'required',
            'angkatan' => 'required|numeric',
            'ipk'      => 'required|numeric|between:0,4.00',
            'status'   => 'required',
            'foto'     => 'nullable|image|mimes:jpg,png,jpeg|max:2048'
        ]);

        // 2. Masukkan SEMUA kolom ke dalam array $data
        $data = [
            'NIM'      => (string) $request->nim,
            'nama'     => $request->nama,
            'jurusan'  => $request->prodi,
            'angkatan' => $request->angkatan, // Sebelumnya ini ketinggalan
            'ipk'      => $request->ipk,      // Sebelumnya ini ketinggalan
            'status'   => $request->status,   // Sebelumnya ini ketinggalan
        ];

        if ($request->hasFile('foto')) {
            if ($mahasiswa->foto) {
                Storage::disk('public')->delete($mahasiswa->foto);
            }
            $data['foto'] = $request->file('foto')->store('mahasiswa', 'public');
        }

        // 3. Eksekusi update
        $mahasiswa->update($data);

        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil diperbarui!');
    }

    public function destroy(Mahasiswa $mahasiswa)
    {
        if ($mahasiswa->foto) {
            Storage::disk('public')->delete($mahasiswa->foto);
        }
        $mahasiswa->delete();
        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil dihapus!');
    }
}