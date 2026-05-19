@if($errors->any())
    <div class="mb-4 p-3 bg-red-100 text-red-700 rounded">
        <ul class="list-disc pl-5">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div>
    <label class="block text-sm font-medium">Kode Mata Kuliah</label>
    <input type="text" name="kode_mk" value="{{ old('kode_mk', $mataKuliah->kode_mk ?? '') }}" class="w-full border rounded px-3 py-2 mt-1" required>
</div>

<div>
    <label class="block text-sm font-medium">Nama Mata Kuliah</label>
    <input type="text" name="nama_mk" value="{{ old('nama_mk', $mataKuliah->nama_mk ?? '') }}" class="w-full border rounded px-3 py-2 mt-1" required>
</div>

<div>
    <label class="block text-sm font-medium">SKS</label>
    <input type="number" name="sks" value="{{ old('sks', $mataKuliah->sks ?? '') }}" class="w-full border rounded px-3 py-2 mt-1" required>
</div>

<div>
    <label class="block text-sm font-medium">Semester</label>
    <input type="number" name="semester" value="{{ old('semester', $mataKuliah->semester ?? '') }}" class="w-full border rounded px-3 py-2 mt-1" required>
</div>

<div>
    <label class="block text-sm font-medium">Dosen Pengampu</label>
    <select name="dosen_id" class="w-full border rounded px-3 py-2 mt-1" required>
        <option value="">-- Pilih Dosen --</option>

        @foreach($dosen as $d)
            <option value="{{ $d->id }}"
                {{ old('dosen_id', $mataKuliah->dosen_id ?? '') == $d->id ? 'selected' : '' }}>
                {{ $d->nama }}
            </option>
        @endforeach
    </select>
</div>