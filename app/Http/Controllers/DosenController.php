<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dosen;

class DosenController extends Controller
{
    public function index(Request $request)
    {
        if (!session()->has('user_id')) {
            return redirect('/');
        }

        $sort = $request->get('sort', 'id');
        $direction = $request->get('direction', 'asc');

        $allowedSort = [
            'id',
            'nidn',
            'nama',
            'email',
            'no_hp',
            'fakultas',
            'jabatan',
            'status_dosen',
        ];

        if (!in_array($sort, $allowedSort)) {
            $sort = 'id';
        }

        if (!in_array($direction, ['asc', 'desc'])) {
            $direction = 'asc';
        }

        $dosen = Dosen::orderBy($sort, $direction)->get();

        return view('dosen.index', compact('dosen', 'sort', 'direction'));
    }

    public function create()
    {
        if (!session()->has('user_id')) {
            return redirect('/');
        }

        return view('dosen.create');
    }

    public function store(Request $request)
    {
        if (!session()->has('user_id')) {
            return redirect('/');
        }

        $request->validate([
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'nidn' => 'required',
            'nama' => 'required',
            'email' => 'required|email',
            'no_hp' => 'required',
            'fakultas' => 'required',
            'jabatan' => 'required',
            'status_dosen' => 'required',
            'alamat' => 'nullable',
        ]);

        $data = $request->except('foto');

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $namaFile = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/dosen'), $namaFile);
            $data['foto'] = $namaFile;
        }

        Dosen::create($data);

        return redirect('/dosen')->with('success', 'Data dosen berhasil ditambahkan!');
    }

    public function edit($id)
    {
        if (!session()->has('user_id')) {
            return redirect('/');
        }

        $dosen = Dosen::findOrFail($id);

        return view('dosen.edit', compact('dosen'));
    }

    public function update(Request $request, $id)
    {
        if (!session()->has('user_id')) {
            return redirect('/');
        }

        $request->validate([
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'nidn' => 'required',
            'nama' => 'required',
            'email' => 'required|email',
            'no_hp' => 'required',
            'fakultas' => 'required',
            'jabatan' => 'required',
            'status_dosen' => 'required',
            'alamat' => 'nullable',
        ]);

        $dosen = Dosen::findOrFail($id);
        $data = $request->except('foto');

        if ($request->hasFile('foto')) {
            if ($dosen->foto && file_exists(public_path('uploads/dosen/' . $dosen->foto))) {
                unlink(public_path('uploads/dosen/' . $dosen->foto));
            }

            $file = $request->file('foto');
            $namaFile = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/dosen'), $namaFile);
            $data['foto'] = $namaFile;
        }

        $dosen->update($data);

        return redirect('/dosen')->with('success', 'Data dosen berhasil diperbarui!');
    }

    public function destroy($id)
    {
        if (!session()->has('user_id')) {
            return redirect('/');
        }

        $dosen = Dosen::findOrFail($id);

        if ($dosen->foto && file_exists(public_path('uploads/dosen/' . $dosen->foto))) {
            unlink(public_path('uploads/dosen/' . $dosen->foto));
        }

        $dosen->delete();

        return redirect('/dosen')->with('success', 'Data dosen berhasil dihapus!');
    }
}