<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MataKuliah;
use App\Models\Dosen;

class MataKuliahController extends Controller
{
    public function index()
    {
        if (!session()->has('user_id')) {
            return redirect('/');
        }

        $mataKuliah = MataKuliah::with('dosen')->get();

        return view('mata_kuliah.index', compact('mataKuliah'));
    }

    public function create()
    {
        if (!session()->has('user_id')) {
            return redirect('/');
        }

        $dosen = Dosen::all();

        return view('mata_kuliah.create', compact('dosen'));
    }

    public function store(Request $request)
    {
        if (!session()->has('user_id')) {
            return redirect('/');
        }

        $request->validate([
            'kode_mk' => 'required',
            'nama_mk' => 'required',
            'sks' => 'required|numeric',
            'semester' => 'required|numeric',
            'dosen_id' => 'required',
        ]);

        MataKuliah::create($request->all());

        return redirect('/mata-kuliah')->with('success', 'Data mata kuliah berhasil ditambahkan!');
    }

    public function edit($id)
    {
        if (!session()->has('user_id')) {
            return redirect('/');
        }

        $mataKuliah = MataKuliah::findOrFail($id);
        $dosen = Dosen::all();

        return view('mata_kuliah.edit', compact('mataKuliah', 'dosen'));
    }

    public function update(Request $request, $id)
    {
        if (!session()->has('user_id')) {
            return redirect('/');
        }

        $request->validate([
            'kode_mk' => 'required',
            'nama_mk' => 'required',
            'sks' => 'required|numeric',
            'semester' => 'required|numeric',
            'dosen_id' => 'required',
        ]);

        $mataKuliah = MataKuliah::findOrFail($id);
        $mataKuliah->update($request->all());

        return redirect('/mata-kuliah')->with('success', 'Data mata kuliah berhasil diperbarui!');
    }

    public function destroy($id)
    {
        if (!session()->has('user_id')) {
            return redirect('/');
        }

        $mataKuliah = MataKuliah::findOrFail($id);
        $mataKuliah->delete();

        return redirect('/mata-kuliah')->with('success', 'Data mata kuliah berhasil dihapus!');
    }
}