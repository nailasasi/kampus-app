@if($errors->any())
    <div class="mb-4 p-3 bg-red-100 text-red-700 rounded">
        <ul class="list-disc pl-5">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div>
        <label class="block mb-2 font-medium">Kode Mata Kuliah *</label>
        <input type="text" name="kode_mk"
               value="{{ old('kode_mk', $mataKuliah->kode_mk ?? '') }}"
               class="w-full border rounded px-4 py-3"
               required>
    </div>

    <div>
        <label class="block mb-2 font-medium">Nama Mata Kuliah *</label>
        <input type="text" name="nama_mk"
               value="{{ old('nama_mk', $mataKuliah->nama_mk ?? '') }}"
               class="w-full border rounded px-4 py-3"
               required>
    </div>

    <div>
        <label class="block mb-2 font-medium">SKS *</label>
        <select name="sks" class="w-full border rounded px-4 py-3" required>
            <option value="">-- Pilih SKS --</option>
            <option value="2" {{ old('sks', $mataKuliah->sks ?? '') == 2 ? 'selected' : '' }}>2 SKS</option>
            <option value="3" {{ old('sks', $mataKuliah->sks ?? '') == 3 ? 'selected' : '' }}>3 SKS</option>
            <option value="4" {{ old('sks', $mataKuliah->sks ?? '') == 4 ? 'selected' : '' }}>4 SKS</option>
        </select>
    </div>

    <div>
        <label class="block mb-2 font-medium">Semester *</label>
        <select name="semester" class="w-full border rounded px-4 py-3" required>
            <option value="">-- Pilih Semester --</option>
            @for($i = 1; $i <= 8; $i++)
                <option value="{{ $i }}" {{ old('semester', $mataKuliah->semester ?? '') == $i ? 'selected' : '' }}>
                    Semester {{ $i }}
                </option>
            @endfor
        </select>
    </div>

    <div class="md:col-span-2">
        <label class="block mb-2 font-medium">Dosen Pengampu *</label>
        <select name="dosen_id" class="w-full border rounded px-4 py-3" required>
            <option value="">-- Pilih Dosen Pengampu --</option>

            @foreach($dosen as $d)
                <option value="{{ $d->id }}"
                    {{ old('dosen_id', $mataKuliah->dosen_id ?? '') == $d->id ? 'selected' : '' }}>
                    {{ $d->nama }} - {{ $d->nidn }}
                </option>
            @endforeach
        </select>
    </div>
</div>