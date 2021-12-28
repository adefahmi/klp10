@extends ('layout.app')

@section('contents')

    <main class="px-3">
        <form action="{{ route('saveeditroom', $kamar->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @foreach ($formdata as $key=>$value)
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">{{ $value[1] }}</label>
                    <select name="{{ $key }}" class="form-select @error($key) is-invalid @enderror" aria-label="Default select example">
                        @foreach ($value[2] as $index=>$value)
                            @php $is_selected = ""; @endphp
                            @if ($value == $kamar->tipe)
                                @php $is_selected = "Selected"; @endphp
                            @endif
                            <option {{$is_selected}} value="{{ $value }}">{{ $value }}<br></option> 
                        @endforeach
                    </select>
                    @error($key)
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            @endforeach

            <div class="form-group mb-3">
                <label for="kapasitas_kamar" class="mb-2">Room Capacity</label>
                <input type="text" class="form-control" name="kapasitas_kamar" id="kapasitas_kamar"
                    value="{{ $kamar->kapasitas_kamar }}">
            </div>

            <div class="form-group mb-3">
                <label for="fasilitas" class="mb-2">Room Description</label>
                <textarea class="form-control" name="fasilitas" id="fasilitas"
                    rows="10">{{ $kamar->fasilitas }}</textarea>
            </div>

            <div class="form-group mb-3">
                <label for="harga" class="mb-2">Room Price</label>
                <input type="text" class="form-control" name="harga" id="harga" value="{{ $kamar->harga }}">
            </div>

            <div class="form-group mb-3">
                <label for="stok_tersedia" class="mb-2">Room Availability</label>
                <input type="text" class="form-control" name="stok_tersedia" id="stok_tersedia"
                    value="{{ $kamar->stok_tersedia }}">
            </div>

            <div class="form-group mb-3">
                <label for="image" class="form-label">Room Image</label>
                <input type="file" class="form-control" id="image" name="image">
                <input type="hidden" id="imageHide" name="imageHide" value="{{ $kamar->image }}">
                <div class="mt-2">Imporant Note: Please leave the above field blank if you wish to keep the
                    current image!</div>
                <br>
                <div>Current Image</div>
                <div><img src="/images/{{ $kamar->image }}" width="150px"></div>
            </div>

            <button type="submit" class="btn btn-primary">Save</button>
            <a type="button" class="btn btn-success" href="{{ route('admin-dashboard') }}">Back</a>

        </form>
        <main>

        @endsection
