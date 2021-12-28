<div class="form-group row">
    <div class="form-group col-md-6">
        <label  for="input-nama">Nama <span class="text-danger">*</span></label>
        <input  type="text"
                name="nama"
                id="input-nama"
                class="form-control{{ $errors->has('nama') ? ' is-invalid' : '' }}"
                value="{{ old('nama') ?: $tipekamar->nama ?? '' }}"
                form="form-tipekamar">
        @include('components.error_help_block', ['key' => 'nama'])
    </div>

</div>
