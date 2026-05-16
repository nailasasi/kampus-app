@extends('layouts.app')
@section('content')
<div class="bg-white rounded-lg shadow-sm p-6 max-w-3xl mx-auto">
    <h1 class="text-2xl font-bold mb-6">Tambah Mahasiswa</h1>
    <form action="{{ route('mahasiswa.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
        @csrf
        @include('mahasiswa.form')
        <div class="flex gap-3 pt-4 border-t">
            <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded-md">Simpan Data</button>
            <a href="{{ route('mahasiswa.index') }}" class="bg-gray-200 px-6 py-2 rounded-md">Batal</a>
        </div>
    </form>
</div>
@endsection