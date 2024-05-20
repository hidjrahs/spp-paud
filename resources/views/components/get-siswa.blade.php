<div class="col-md-8 form-group">
    <select wire:model.change="$parent.siswaID" class="choices form-select">
        <option value=''>Pilih Siswa</option>
        @foreach ($siswa as $item)
            <option value='{{ $item->id }}''> {{ $item->nama . ' - ' . $item->kelas->nama }} </option>
        @endforeach

    </select>
</div>
