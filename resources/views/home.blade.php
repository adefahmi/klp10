@extends('layout.app')

@section('contents')
    <html lang="en">

    <body>
        <main>
            <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="/img/HomeBG.jpg" alt="First slide">

                        <div class="container">
                            <div class="carousel-caption ">
                                <h1>WELCOME TO BALI</h1>
                                <br>
                                <p>HotelKu.com berlokasi strategis di jantung kota Denpasar, ibukota Provinsi Bali yang
                                    terus berkembang. Diuntungkan karena terletak di sisi jalan raya yang menghubungkan dua
                                    tujuan wisata terkenal, Kuta dan Ubud, hotel ini sangat cocok untuk pelancong bisnis dan
                                    liburan.</p>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="/img/HomeBG2.jpg" alt="Second slide">

                        <div class="container">
                            <div class="carousel-caption text-start">
                                <h1>Beristirahat dan bersantai</h1>
                                <p>Nikmati istirahat anda dengan kamar modern yang bersih dan nyaman</p>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="/img/HomeBG3.jpg" alt="Third slide">

                        <div class="container">
                            <div class="carousel-caption text-end">
                                <h1>Hidangan yang lezat</h1>
                                <p>Nikmati hidangan lezat yang dibuat oleh koki terbaik di Indonesia dengan bahan yang segar
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            <br>
            <div class="col-md text-center">
                <br>
                <i>
                    <p class="lead">Sedang liburan atau perjalanan bisnis?
                        Ingin mencari hotel biaya murah dengan fasilitas dan layanan yang lengkap?
                    </p>
                </i>
                <i>
                    <p class="lead">Hotelku.com jawabannya!
                    </p>
                </i>
            </div>
            <br>

            <!-- START THE FEATURETTES -->

            <hr class="featurette-divider">

            <div class="row featurette">
                <div class="col-md text-center">
                    <h2 class="featurette-heading">List Kamar</h2>

                </div>
            </div>

            <hr class="featurette-divider">

            <div class="row featurette">
                <div class="col-md-7">
                    <h2 class="featurette-heading">Suite Room<span class="text-muted"></span></h2>
                    <br>
                    <br>
                    <p class="lead">Kamar modern yang terletak di lantai dua, dengan luas 40 meter persegi. Kamar
                        ini cocok untuk menampung 2 orang dewasa.</p>
                    <br>
                    <p class="lead">Dilengkapi dengan :</p>
                    <p class="lead"> • 2 Tempat Tidur, dengan kasur berukuran queen</p>
                    <p class="lead"> • 1 Sofa</p>
                    <p class="lead"> • 1 Kamar Mandi</p>
                    <br>
                    <p class="lead"> Harga dimulai dari <b>Rp 200.000 </b> per malam. </p>
                    <br>
                    </p>
                </div>
                <div class="col-md-5">
                    <img class="d-block w-100" src="/images/1638672198.jpg">
                </div>
            </div>

            <hr class="featurette-divider">

            <div class="row featurette">
                <div class="col-md-7 order-md-2">
                    <h2 class="featurette-heading">Deluxe Room<span class="text-muted"> </span></h2>
                    <br>
                    <br>
                    <p class="lead">Kamar modern yang terletak di lantai tiga, dengan luas 80 meter persegi. Kamar
                        ini cocok untuk menampung 3 orang dewasa.</p>
                    <br>
                    <p class="lead">Dilengkapi dengan :</p>
                    <p class="lead"> • 3 Tempat Tidur, dengan kasur berukuran queen</p>
                    <p class="lead"> • 2 Sofa</p>
                    <p class="lead"> • 2 Kamar Mandi</p>
                    <p class="lead"> • Lounge Pagi</p>
                    <br>
                    <p class="lead"> Harga dimulai dari <b>Rp 300.000 </b> per malam. </p>
                    <br>
                </div>
                <div class="col-md-5 order-md-1">
                    <img class="d-block w-100" src="/images/1638672406.jpg">
                </div>
            </div>

            <hr class="featurette-divider">

            <div class="row featurette">
                <div class="col-md-7">
                    <h2 class="featurette-heading">Standar Room<span class="text-muted"> </span></h2>
                    <br>
                    <br>
                    <p class="lead">Kamar modern yang terletak di lantai satu, dengan luas 30 meter persegi. Kamar
                        ini cocok untuk menampung 1 orang dewasa.</p>
                    <br>
                    <p class="lead">Dilengkapi dengan :</p>
                    <p class="lead"> • 1 Tempat Tidur, dengan kasur berukuran single</p>
                    <p class="lead"> • 1 Sofa</p>
                    <p class="lead"> • 1 Kamar Mandi</p>
                    <br>
                    <p class="lead"> Harga dimulai dari <b>Rp 100.000 </b> per malam. </p>
                    <br>
                </div>

                <div class="col-md-5">
                    <img class="d-block w-100" src="/images/1638672034.png">

                </div>
            </div>

            <hr class="featurette-divider">

            <!-- /END THE FEATURETTES -->
            </div>
        </main>
    </body>

    </html>

@endsection
