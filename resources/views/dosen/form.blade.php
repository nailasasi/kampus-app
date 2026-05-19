@if($errors->any())
    <div class="mb-4 p-3 bg-red-100 text-red-700 rounded">
        <ul class="list-disc pl-5">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="mb-6">
    <label class="block mb-2 font-medium">Foto Dosen</label>

    @if(isset($dosen) && $dosen->foto)
        <div class="mb-3">
            <img src="{{ asset('uploads/dosen/' . $dosen->foto) }}"
                 class="w-24 h-24 object-cover rounded border">
        </div>
    @endif

    <input type="file" name="foto" class="w-full border rounded px-4 py-3">
    <p class="text-sm text-gray-500 mt-1">Format JPG/PNG, maksimal 2 MB</p>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div>
        <label class="block mb-2 font-medium">NIDN *</label>
        <input type="text" name="nidn"
               value="{{ old('nidn', $dosen->nidn ?? '') }}"
               class="w-full border rounded px-4 py-3"
               required>
    </div>

    <div>
        <label class="block mb-2 font-medium">Nama Lengkap *</label>
        <input type="text" name="nama"
               value="{{ old('nama', $dosen->nama ?? '') }}"
               class="w-full border rounded px-4 py-3"
               required>
    </div>

    <div>
        <label class="block mb-2 font-medium">Email *</label>
        <input type="email" name="email"
               value="{{ old('email', $dosen->email ?? '') }}"
               class="w-full border rounded px-4 py-3"
               required>
    </div>

    <div>
        <label class="block mb-2 font-medium">No HP *</label>
        <input type="text" name="no_hp"
               value="{{ old('no_hp', $dosen->no_hp ?? '') }}"
               class="w-full border rounded px-4 py-3"
               required>
    </div>

    <div>
        <label class="block mb-2 font-medium">Fakultas *</label>
        <select name="fakultas" class="w-full border rounded px-4 py-3" required>
            <option value="">-- Pilih Fakultas --</option>
            <option value="Ilmu Komputer" {{ old('fakultas', $dosen->fakultas ?? '') == 'Ilmu Komputer' ? 'selected' : '' }}>Ilmu Komputer</option>
            <option value="Teknik" {{ old('fakultas', $dosen->fakultas ?? '') == 'Teknik' ? 'selected' : '' }}>Teknik</option>
            <option value="Ekonomi" {{ old('fakultas', $dosen->fakultas ?? '') == 'Ekonomi' ? 'selected' : '' }}>Ekonomi</option>
            <option value="Bisnis" {{ old('fakultas', $dosen->fakultas ?? '') == 'Bisnis' ? 'selected' : '' }}>Bisnis</option>
        </select>
    </div>

    <div>
        <label class="block mb-2 font-medium">Jabatan *</label>
        <select name="jabatan" class="w-full border rounded px-4 py-3" required>
            <option value="">-- Pilih Jabatan --</option>
            <option value="Asisten Ahli" {{ old('jabatan', $dosen->jabatan ?? '') == 'Asisten Ahli' ? 'selected' : '' }}>Asisten Ahli</option>
            <option value="Lektor" {{ old('jabatan', $dosen->jabatan ?? '') == 'Lektor' ? 'selected' : '' }}>Lektor</option>
            <option value="Lektor Kepala" {{ old('jabatan', $dosen->jabatan ?? '') == 'Lektor Kepala' ? 'selected' : '' }}>Lektor Kepala</option>
            <option value="Profesor" {{ old('jabatan', $dosen->jabatan ?? '') == 'Profesor' ? 'selected' : '' }}>Profesor</option>
        </select>
    </div>

    <div>
        <label class="block mb-2 font-medium">Status Dosen *</label>
        <select name="status_dosen" class="w-full border rounded px-4 py-3" required>
            <option value="">-- Pilih Status --</option>
            <option value="Tetap" {{ old('status_dosen', $dosen->status_dosen ?? '') == 'Tetap' ? 'selected' : '' }}>Tetap</option>
            <option value="Tidak Tetap" {{ old('status_dosen', $dosen->status_dosen ?? '') == 'Tidak Tetap' ? 'selected' : '' }}>Tidak Tetap</option>
        </select>
    </div>
</div>

<div class="mt-6">
    <label class="block mb-2 font-medium">Alamat</label>
    <textarea name="alamat"
              class="w-full border rounded px-4 py-3"
              rows="4">{{ old('alamat', $dosen->alamat ?? '') }}</textarea>
</div>