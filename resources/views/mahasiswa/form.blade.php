{{-- resources/views/mahasiswa/form.blade.php --}}
@if ($errors->any())
<div class="mb-4 bg-red-50 border-l-4 border-red-500 p-4 rounded">
    <p class="font-semibold text-red-700 mb-2">Terdapat kesalahan:</p>
    <ul class="list-disc list-inside text-sm text-red-700 space-y-1">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">NIM <span class="text-red-500">*</span></label>
        {{-- PENTING: Ubah maxlength ke 20 agar NIM 11 digit (24082010063) tidak terpotong --}}
        <input type="text" name="nim" value="{{ old('nim', $mahasiswa->NIM ?? '') }}" required maxlength="20" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-green-500 focus:outline-none">
    </div>
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap <span class="text-red-500">*</span></label>
        <input type="text" name="nama" value="{{ old('nama', $mahasiswa->nama ?? '') }}" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-green-500 focus:outline-none">
    </div>
</div>

{{-- Jenis Kelamin & Prodi --}}
<div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Jenis Kelamin <span class="text-red-500">*</span></label>
        <select name="jenis_kelamin" required class="w-full px-3 py-2 border border-gray-300 rounded-md">
            <option value="">-- Pilih --</option>
            <option value="L" {{ old('jenis_kelamin', $mahasiswa->jenis_kelamin ?? '') == 'L' ? 'selected' : '' }}>Laki-laki</option>
            <option value="P" {{ old('jenis_kelamin', $mahasiswa->jenis_kelamin ?? '') == 'P' ? 'selected' : '' }}>Perempuan</option>
        </select>
    </div>
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Program Studi <span class="text-red-500">*</span></label>
        {{-- PENTING: name tetap "prodi" agar tidak perlu mengubah semua logic Controller, 
             tapi value diambil dari $mahasiswa->jurusan agar sinkron dengan database --}}
        <select name="prodi" required class="w-full px-3 py-2 border border-gray-300 rounded-md">
            <option value="">-- Pilih Prodi --</option>
            <option value="Sistem Informasi" {{ old('prodi', $mahasiswa->jurusan ?? '') == 'Sistem Informasi' ? 'selected' : '' }}>Sistem Informasi</option>
            <option value="Teknik Informatika" {{ old('prodi', $mahasiswa->jurusan ?? '') == 'Teknik Informatika' ? 'selected' : '' }}>Informatika</option>
        </select>
    </div>
</div>

{{-- Foto --}}
<div class="mt-4">
    <label class="block text-sm font-medium text-gray-700 mb-1">Foto</label>
    @if(isset($mahasiswa) && $mahasiswa->foto)
    <div class="mb-3">
        <img src="{{ asset('storage/' . $mahasiswa->foto) }}" alt="Preview" class="w-20 h-20 rounded-md object-cover border">
    </div>
    @endif
    <input type="file" name="foto" accept="image/*" class="w-full px-3 py-2 border border-gray-300 rounded-md">
</div>

{{-- Baris Angkatan dan IPK --}}
<div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Angkatan</label>
        <input type="number" name="angkatan" value="{{ old('angkatan', $mahasiswa->angkatan ?? '') }}" placeholder="2024" class="w-full px-3 py-2 border rounded-md">
    </div>
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">IPK</label>
        <input type="number" step="0.01" name="ipk" value="{{ old('ipk', $mahasiswa->ipk ?? '') }}" placeholder="4.00" class="w-full px-3 py-2 border rounded-md">
    </div>
</div>

{{-- Baris Status --}}
<div class="mt-4">
    <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
    <select name="status" class="w-full px-3 py-2 border rounded-md">
        <option value="Aktif" {{ old('status', $mahasiswa->status ?? '') == 'Aktif' ? 'selected' : '' }}>Aktif</option>
        <option value="Cuti" {{ old('status', $mahasiswa->status ?? '') == 'Cuti' ? 'selected' : '' }}>Cuti</option>
    </select>
</div>