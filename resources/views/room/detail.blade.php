@extends ('layout.app')

@section ('contents')

<h1 class="centerTitle">{{$kamar->tipe}}</h1>
<div class="container">
    <div class="row">
        <div class="col-md-6 contentLeft">
            <br>
            <img class="centerImage" src="/images/{{$kamar->image}}" width="500">
            <br>
            <a type="button" class="btn btn-success my-2 mx-2" href="{{route('editroom',$kamar->id)}}">Edit</a>
            <a type="button" class="btn btn-dark my-2" href="javascript:window.history.back()">Back</a>
        </div>

        <div class="col-md-4 contentRight">
            <div class="card">
                <div class="card-body"> 
                    <table> 
                        <tr>
                            <th>
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                                </svg>
                            </th>
                            <td>{{$kamar->kapasitas_kamar}}</td>
                        </tr>
                        <tr>
                            <th>
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-sticky" viewBox="0 0 16 16">
                                <path d="M2.5 1A1.5 1.5 0 0 0 1 2.5v11A1.5 1.5 0 0 0 2.5 15h6.086a1.5 1.5 0 0 0 1.06-.44l4.915-4.914A1.5 1.5 0 0 0 15 8.586V2.5A1.5 1.5 0 0 0 13.5 1h-11zM2 2.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 .5.5V8H9.5A1.5 1.5 0 0 0 8 9.5V14H2.5a.5.5 0 0 1-.5-.5v-11zm7 11.293V9.5a.5.5 0 0 1 .5-.5h4.293L9 13.793z"/>
                                </svg>
                            </th>
                            <td>{{$kamar->fasilitas}}</td>
                        </tr>
                        <tr>
                            <th>
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-tags" viewBox="0 0 16 16">
                                <path d="M3 2v4.586l7 7L14.586 9l-7-7H3zM2 2a1 1 0 0 1 1-1h4.586a1 1 0 0 1 .707.293l7 7a1 1 0 0 1 0 1.414l-4.586 4.586a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 2 6.586V2z"/>
                                <path d="M5.5 5a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1zm0 1a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3zM1 7.086a1 1 0 0 0 .293.707L8.75 15.25l-.043.043a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 0 7.586V3a1 1 0 0 1 1-1v5.086z"/>
                                </svg>
                            </th>
                            <td>{{$kamar->harga}}</td>
                        </tr>
                    </table>
                    <div class="text-center">
                        <a type="button" class="btn btn-primary my-2 mx-2" href="/x">Pesan</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection