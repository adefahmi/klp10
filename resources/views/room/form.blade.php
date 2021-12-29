<div class="form-group mb-3">
    <label for="nama" class="mb-2">Room Name</label>
    <input type="text"
            name="nama"
            id="nama"
            class="form-control{{ $errors->has('nama') ? ' is-invalid' : '' }}"
            value="{{ old('nama') ?: $kamar->nama ?? '' }}"
            form="form-kamar">
    @include('components.error_help_block', ['key' => 'nama'])
</div>
<div class="form-group mb-3">
    <label  for="input-tipe_kamar_id">Tipe Kamar <span class="text-danger">*</span></label>
    <select
            class="form-control{{ $errors->has('tipe_kamar_id') ? ' is-invalid' : '' }}"
            id="input-tipe_kamar_id"
            name="tipe_kamar_id"
            style="width: 100%;"
            data-placeholder="Pilih Tipe Kamar.."
            form="form-kamar">
            <option></option>
            @foreach ($tipekamars as $key => $value )
                <option {{ (old('tipe_kamar_id') ?: $kamar->tipe_kamar_id) == $key ? 'selected' : '' }} value="{{ $key }}">{{$value}}</option>
            @endforeach
    </select>
    @include('components.error_help_block', ['key' => 'tipe_kamar_id'])
</div>
<div class="form-group mb-3">
    <label for="kapasitas_kamar" class="mb-2">Room Capacity</label>
    <input type="text"
            name="kapasitas_kamar"
            id="kapasitas_kamar"
            class="form-control{{ $errors->has('kapasitas_kamar') ? ' is-invalid' : '' }}"
            value="{{ old('kapasitas_kamar') ?: $kamar->kapasitas_kamar ?? '' }}"
            form="form-kamar">
    @include('components.error_help_block', ['key' => 'kapasitas_kamar'])
</div>

<div class="form-group mb-3">
    <label for="fasilitas" class="mb-2">Room Description</label>
    <textarea
        name="fasilitas"
        id="fasilitas"
        class="form-control{{ $errors->has('fasilitas') ? ' is-invalid' : '' }}"
        form="form-kamar"
        rows="10">{{ old('fasilitas') ?: $kamar->fasilitas ?? '' }}</textarea>
    @include('components.error_help_block', ['key' => 'fasilitas'])
</div>

<div class="form-group mb-3">
    <label for="harga" class="mb-2">Room Price</label>
    <input
        type="number"
        name="harga"
        id="harga"
        class="form-control{{ $errors->has('harga') ? ' is-invalid' : '' }}"
        value="{{ old('harga') ?: $kamar->harga ?? '' }}"
        form="form-kamar">
    @include('components.error_help_block', ['key' => 'harga'])
</div>

<div class="form-group mb-3">
    <label for="stok_tersedia" class="mb-2">Room Availability</label>
    <input
        type="number"
        name="stok_tersedia"
        id="stok_tersedia"
        class="form-control{{ $errors->has('stok_tersedia') ? ' is-invalid' : '' }}"
        value="{{ old('stok_tersedia') ?: $kamar->stok_tersedia ?? '' }}"
        form="form-kamar">
    @include('components.error_help_block', ['key' => 'stok_tersedia'])
</div>

<div class="form-group mb-3">
    <label for="image" class="form-label">Room Image</label>
    <input
        type="file"
        class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}"
        id="image"
        form="form-kamar"
        name="image">
    @include('components.error_help_block', ['key' => 'image'])

    <input type="hidden" id="imageHide" form="form-kamar" name="imageHide" value="{{ $kamar->image }}">
    <div class="mt-2">Imporant Note: Please leave the above field blank if you wish to keep the
        current image!</div>
    <br>
    @if (request()->routeIs('editroom'))
        <div>Current Image</div>
        <div><img src="/images/{{ $kamar->image }}" width="150px"></div>
    @endif
</div>
