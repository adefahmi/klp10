<div class="form-group row">
    <div class="form-group col-md-5">
        <label  for="input-kamar_id">Kamar</label>
        <select
                class="js-select2 form-control{{ $errors->has('kamar_id') ? ' is-invalid' : '' }}"
                id="input-kamar_id"
                name="kamar_id"
                style="width: 100%;"
                data-placeholder="Pilih Kamar.."
                form="form-filter">
                <option></option>
                @foreach ($kamars as $key => $value )
                    <option {{ request('kamar_id') == $key ? 'selected' : '' }} value="{{ $key }}">{{$value}}</option>
                @endforeach
        </select>
        @include('components.error_help_block', ['key' => 'kamar_id'])
    </div>
    <div class="form-group col-md-5">
        <label  for="input-tipekamar">Tipe Kamar</label>
        <select
                class="js-select2 form-control{{ $errors->has('tipekamar') ? ' is-invalid' : '' }}"
                id="input-tipekamar"
                name="tipekamar"
                style="width: 100%;"
                data-placeholder="Pilih Tipe Kamar.."
                form="form-filter">
                <option></option>
                @foreach ($tipekamars as $key => $value )
                    <option {{ request('tipekamar') == $key ? 'selected' : '' }} value="{{ $key }}">{{$value}}</option>
                @endforeach
        </select>
        @include('components.error_help_block', ['key' => 'tipekamar'])
    </div>
    <div class="form-group col-md-5">
        <label  for="input-status">Status</label>
        <select
                class="form-control{{ $errors->has('status') ? ' is-invalid' : '' }}"
                id="input-status"
                name="status"
                style="width: 100%;"
                data-placeholder="Pilih Tipe Kamar.."
                form="form-filter">
                <option></option>
                @foreach ($statuss as $key => $value )
                    <option {{ request('status') == $value ? 'selected' : '' }} value="{{ $value }}">{{$value}}</option>
                @endforeach
        </select>
        @include('components.error_help_block', ['key' => 'status'])
    </div>
    <div class="form-group col-md-2">
        <label for="input-dateFrom">Tanggal Dari</label>
        <input
            type="text"
            name="dateFrom"
            id="datepicker1"
            class="form-control {{ $errors->has('dateFrom') ? 'is-invalid' : '' }}"
            value="{{ old('dateFrom') ?: request('dateFrom') ?? '' }}"
            autocomplete="off"
            form="form-filter">
    </div>
    <div class="form-group col-md-2">
        <label for="input-dateTo">Tanggal Sampai</label>
        <input
            type="text"
            name="dateTo"
            id="datepicker2"
            class="form-control {{ $errors->has('dateTo') ? 'is-invalid' : '' }}"
            value="{{ old('dateTo') ?: request('dateTo') ?? '' }}"
            autocomplete="off"
            form="form-filter">
    </div>
    {{-- <div class="col-sm-2 d-flex align-items-center">
        <div></div>
        <button type="submit" class="btn btn-primary mr-2" form="form-filter">Apply</button>
        <a class="btn btn-secondary" href="{{route('pemegang_saham.index')}}" > Reset</a>
    </div> --}}
</div>
