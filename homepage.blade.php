<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>{{ env('APP_NAME') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Aplikasi pengajuan rekomtek BBWS Serayu Opak.">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico" />
    <link rel="stylesheet" href="google-opensans.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">

    <link rel="stylesheet" href="custom/css/custom-homepage.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    {{-- Peta koordinat--}}
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.2/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.2/dist/leaflet.js"></script>
    <script src='https://unpkg.com/shpjs@latest/dist/shp.js'></script>
    <script src={{ asset('js/leaflet.shpfile.js') }}></script>

    <style type="text/css">
        #lat, #lon { text-align:right }
        /* #map { width:100%;height:50%;padding:0;margin:0; } */
        .address { cursor:pointer }
        .address:hover { color:#AA0000;text-decoration:underline }
    </style>

    <!-- icon -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">


</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top ">
        <div class="md:container md:mx-auto d-flex align-items-center justify-content-between">

            <h1 class="logo flex">
                <img src="{{ asset('img/logo air.png') }}" alt="">
                <div class=" ml-3">
                    <a href="">AiR BBWS SO</a>
                </div>
            </h1>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                    <li><a class="nav-link scrollto" href="#about">Tentang</a></li>
                    <li><a class="nav-link scrollto" href="#lokasi">Cek Lokasi</a></li>
                    <li><a class="nav-link scrollto" href="#pendaftaran">Pendaftaran</a></li>
                    <li><a class="nav-link scrollto" href="#contact">Hubungi Kami</a></li>
                    <a class="nav-link scrollto rounded-xl my-2 mx-3 md:!mr-0 md:!ml-6 py-3 px-4 md:!py-1 border-2 border-amber-300 !justify-center" href="login">Login</a>
                    <a class="inline-flex items-center text-center md:mx-0 px-4 py-4 md:!py-2 rounded-xl border-2 border-amber-300
                        font-semibold text-xs text-blue-800 !justify-center tracking-widest my-2 mx-3 md:!mr-0 md:!ml-6 bg-amber-300 hover:bg-amber-400
                        transition ease-in-out duration-150" href="register">
                        Daftar
                    </a>

                </ul>
                <span id="menu" class="material-icons-round mobile-nav-toggle">menu</span>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <!-- ======= Home ======= -->
    <section id="hero">
        <div class="hero-container">
            <div class="grid grid-cols-1 md:grid-cols-2 mt-20 gap-0">
                <img src="{{ asset('img/k3.png') }}" class=" px-10 md:px-0 md:max-w-md lg:max-w-lg" alt="gambar K3">
                <img src="{{ asset('img/scan me.png') }}" class=" px-10 md:px-0 md:max-w-md lg:max-w-lg" alt="gambar scan me">
            </div>
        </div>

    </section><!-- End Home -->

    <main id="main">

        <!-- ======= Tentang ======= -->
        <section id="about" class="about mt-10 md:mt-20">

                <div class="section-title">
                    <h3>Aplikasi Rekomtek <span>BBWS Serayu Opak</span></h3>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 md:gap-10 lg:px-40 justify-center items-center pt-20">

                    <div class="text-justify lg:px-10">
                        Aplikasi Rekomtek atau yang kami sebut AiR adalah Portal Maya Balai Besar Wilayah Sungai Serayu Opak dalam rangka memberikan layanan langsung kepada semua masyarakat dalam hal permohonan Rekomendasi Teknis dan Surat Keterangan Garis Sempadan di Wilayah Kerja BBWS Serayu Opak.
                    </div>
                    <img class=" max-w-xs md:max-w-sm" src="{{ asset('img/orang hijab.png') }}" alt="gambar 1">

                    <img class=" md:max-w-xl pt-20 pb-10 md:pb-0 md:justify-self-end" src="{{ asset('img/orang duduk.png') }}" alt="gambar 2">
                    <div class="text-justify lg:px-10">
                        AiR ini merupakan Aplikasi yang dibuat untuk memudahkan Anda untuk mengajukan dan memantau permohonan Anda secara mandiri dan online.
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 md:gap-10 lg:px-40 justify-center items-center pt-20">
                    <div class="text-justify lg:px-10">
                        Jika Anda pengguna baru, Anda dapat memulai dengan mempelajari <a class="text-cyan-500 font-bold" href="">Panduan</a> yang sudah kami siapkan . Kami juga menyiapkan nomor telpon dan email yang bisa dilihat pada bagian <a class="text-cyan-500 font-bold scrollto" href="#contact">Hubungi Kami</a>. Atau jika anda adalah pengguna yang sudah melakukan pendaftaran sebelumnya, silahkan langsung menuju bagian <a class="text-cyan-500 font-bold" href="login">Login</a>.
                    </div>
                    <img class=" h-max" src="{{ asset('img/orang_meja.png') }}" alt="gambar 3">
                </div>
        </section><!-- End Tentang -->

        <!-- ======= Founder ======= -->
        <section id="about" class="about grid place-content-center">
            <div>

                <div class="section-title">
                    <div class="grid grid-cols-2 gap-3 md:px-40">
                        <h3 class=" text-right">Founder</h3>
                        <h3 class=" text-left"><span>AiR</span></h3>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-x-3 md:px-40 justify-center items-center text-2xl md:text-3xl" style="font-family: 'Teko', sans-serif;">

                    <div class=" text-right">
                        Tirto
                    </div>
                    <div class=" text-cyan-500">
                        Atmaji
                    </div>

                    <div class=" text-right">
                        Pradana
                    </div>
                    <div class=" text-cyan-500">
                        Kartika Abimantra
                    </div>

                    <div class=" text-right">
                        Ika
                    </div>
                    <div class=" text-cyan-500">
                        Ernawati
                    </div>
                </div>

            </div>

            <div class=" mt-3">

                <div class="section-title">
                    <div class="grid grid-cols-2 gap-3 md:px-40">
                        <h3 class=" text-right">Desain</h3>
                        <h3 class=" text-left"><span>AiR</span></h3>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-x-3 md:px-40 justify-center items-center text-2xl md:text-3xl" style="font-family: 'Teko', sans-serif;">

                    <div class=" text-right">
                        Sumarno
                    </div>
                    <div class=" text-cyan-500">

                    </div>
                    <div class=" text-right">
                        Endang
                    </div>
                    <div class=" text-cyan-500">
                        Setiyawati
                    </div>

                    <div class=" text-right">
                        Yeuma
                    </div>
                    <div class=" text-cyan-500">
                        Isnanda
                    </div>

                    <div class=" text-right">
                        Afrizal
                    </div>
                    <div class=" text-cyan-500">
                        Irfani
                    </div>

                    <div class=" text-right">
                        Akhmad
                    </div>
                    <div class=" text-cyan-500">
                        Rifqi Septiawan
                    </div>

                </div>

            </div>

            <div class=" mt-3">

                <div class="section-title">
                    <div class="grid grid-cols-1 md:px-40">
                        <h3 class=" text-center">Pembina</h3>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-3 md:px-40 justify-center items-center text-2xl md:text-3xl" style="font-family: 'Teko', sans-serif;">
                    <div class=" text-right">
                        Antyarsa
                    </div>
                    <div class=" text-cyan-500">
                        Ikana Dani
                    </div>
                </div>

            </div>

            <div class=" mt-3">

                <div class="section-title">
                    <div class="grid grid-cols-1 md:px-40">
                        <h3 class=" text-center">Creator</h3>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-3 md:px-40 justify-center items-center text-2xl md:text-3xl" style="font-family: 'Teko', sans-serif;">
                    <div class=" text-right">
                        Fathan
                    </div>
                    <div class=" text-cyan-500">
                        Asyhari
                    </div>
                </div>

            </div>

            <div class=" mt-3 mb-10">

                <div class="section-title">
                    <div class="grid grid-cols-1 md:px-40">
                        <h3>Tim <span>Sekretariat</span></h3>
                    </div>
                </div>

                <div class="lg:px-80 justify-center items-center text-xl md:text-2xl text-center tracking-wider" style="font-family: 'Teko', sans-serif;">
                       <a class=" uppercase font-bold">Dwi</a> Tamtomo
                       <a class=" uppercase font-bold">Ariyo</a> Saloko
                       <a class=" uppercase font-bold">Aditya</a> Kurniawan
                       <a class=" uppercase font-bold">Noor</a> Baiti
                       <a class=" uppercase font-bold">Vendra</a> Nugroho
                       <a class=" uppercase font-bold">Achid</a> Triyono
                       <a class=" uppercase font-bold">Muafiq</a>
                       <a class=" uppercase font-bold">Ari</a> Widyastomo
                       <a class=" uppercase font-bold">Muhammad</a> Hadi
                       <a class=" uppercase font-bold">Khairudin</a>
                       <a class=" uppercase font-bold">Tri</a> Septian Munandar
                </div>

            </div>
        </section><!-- End Founder -->

        <!-- ======= Tanpa Biaya ======= -->
        <div class="tanpa-biaya-container lg:mt-40 overflow-hidden">
            <img class="bg-cover bg-local bg-center max-w-3xl md:max-w-6xl lg:max-w-full" src="{{ asset('img/bebas_biaya.png') }}" alt="gambar 3">
        </div>

        {{-- Peta Lokasi --}}
        <section id="lokasi">
            <div class="lg:px-40">
                <div class="section-title">
                    <h3>Cek Lokasi <span>Permohonan</span></h3>
                </div>

                <div class=" mt-3" id="search">
                    <x-label class="font-bold mt-4" for="addr"
                        :value="__('Cari dengan Alamat')" />
                    <x-input class="w-full placeholder:italic placeholder:text-slate-400 mt-1" type="text" name="addr" value="" id="addr" placeholder="Contoh: jalan seturan sleman/ sungai progo sleman" onfocus="document.getElementById('hasil_pencarian').style.display='block';" onkeyup="addr_search();"/>
                    {{-- <x-buttonBiasa type="button" class="bg-slate-500 mt-2" onclick="addr_search();">Cari</x-buttonBiasa> --}}
                    <div id="hasil_pencarian" class=" absolute hidden p-3 z-10 max-h-fit max-w-fit border-1 rounded-2xl shadow-md bg-white animate-fade-in-up">
                        <x-label class="font-bold" for="addr"
                        :value="__('Hasil Pencarian: ')" />
                        <div class=" overflow-auto m-2 transition ease-in-out" id="results" onclick="document.getElementById('hasil_pencarian').style.display='none';"></div>
                    </div>
                </div>

                <script>
                    window.onload = function () {
                        var divToHide = document.getElementById('hasil_pencarian');
                        document.onclick = function (e) {
                            if (e.target.id !== 'addr') {
                                //element clicked wasn't the div; hide the div
                                divToHide.style.display = 'none';
                            }
                        };
                    };
                    </script>

                <x-label class="font-bold mt-4"
                    :value="__('Atau Input Koordinat Secara Mandiri ( Opsional )')" />

                <div class="grid grid-cols-2 gap-2 mt-2">
                    <div>
                        <x-label for="lat" :value="__('Latitude(Garis Lintang)')" />
                        <x-input class="w-full mt-1" type="text" name="lat" id="lat" value=""
                            onkeyup="pilihPakeKoordinat(document.getElementById('lat').value, document.getElementById('lon').value);return false;" />
                    </div>

                    <div>
                        <x-label for="lon" :value="__('Longitude(Garis Bujur)')" />
                        <x-input class="w-full mt-1" type="text" name="lon" id="lon" value=""
                            onkeyup="pilihPakeKoordinat(document.getElementById('lat').value, document.getElementById('lon').value);return false;" />
                    </div>
                </div>

                <x-label class="font-bold mt-4">
                    Geser Pointer (
                    <span class="material-icons-round icon text-blue-600">location_on</span>
                    ) pada Peta Jika Hasil Kurang Akurat ( Opsional )
                </x-label>
                <div class="rounded-2xl shadow-sm border-1 h-96 z-0 mt-1" id="map"></div>


                {{-- JS untuk Peta Koordinat --}}
                <script type="text/javascript">

                    // Yogyakarta

                        var startlat = -7.80119450;
                        var startlon = 110.36491700;

                    var options = {
                        center: [startlat, startlon],
                        zoom: 10
                    }

                    document.getElementById('lat').value = startlat;
                    document.getElementById('lon').value = startlon;

                    var map = L.map('map', options);
                    var nzoom = 12;

                    L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
                        attribution: 'OSM'
                    }).addTo(map);

                    var shpfile = new L.Shapefile('{{ asset("ashiap.zip") }}');
                    shpfile.addTo(map);

                    var myMarker = L.marker([startlat, startlon], {
                        title: "Coordinates",
                        alt: "Coordinates",
                        draggable: true
                    }).addTo(map).on('dragend', function () {
                        var lat = myMarker.getLatLng().lat.toFixed(8);
                        var lon = myMarker.getLatLng().lng.toFixed(8);
                        var czoom = map.getZoom();
                        if (czoom < 16) {
                            nzoom = czoom + 2;
                        }
                        // if (nzoom > 16) {
                        //     nzoom = 16;
                        // }
                        if (czoom != 18) {
                            map.setView([lat, lon], nzoom);
                        }
                        else {
                            map.setView([lat, lon]);
                        }
                        document.getElementById('lat').value = lat;
                        document.getElementById('lon').value = lon;
                        myMarker.bindPopup("Latitude: " + lat + "<br />Longitude: " + lon).openPopup();
                    });

                    function chooseAddr(lat1, lng1) {
                        myMarker.closePopup();
                        map.setView([lat1, lng1], 18);
                        myMarker.setLatLng([lat1, lng1]);
                        lat = lat1.toFixed(8);
                        lon = lng1.toFixed(8);
                        document.getElementById('lat').value = lat;
                        document.getElementById('lon').value = lon;
                        myMarker.bindPopup("Latitude: " + lat + "<br />Longitude: " + lon).openPopup();
                    }

                    function pilihPakeKoordinat(lat1, lng1) {
                        myMarker.closePopup();
                        map.setView([lat1, lng1], 18);
                        myMarker.setLatLng([lat1, lng1]);
                        // lat = lat1.toFixed(8);
                        // lon = lng1.toFixed(8);
                        // document.getElementById('lat').value = lat;
                        // document.getElementById('lon').value = lon;
                        myMarker.bindPopup("Latitude: " + lat1 + "<br />Longitude: " + lng1).openPopup();
                    }

                    function myFunction(arr) {
                        // var out = "<br />";
                        var out = "<p></p>";
                        var i;

                        if (arr.length > 0) {
                            for (i = 0; i < arr.length; i++) {
                                out += "<div class='address' title='Show Location and Coordinates' onclick='chooseAddr(" + arr[i].lat + ", " + arr[i].lon + ");return false;'> - " + arr[i].display_name + "</div>";
                            }
                            document.getElementById('results').innerHTML = out;
                        } else {
                            document.getElementById('results').innerHTML = "Sedang mencari...";
                        }

                    }

                    function addr_search() {
                        var inp = document.getElementById("addr");
                        var xmlhttp = new XMLHttpRequest();
                        var url = "https://nominatim.openstreetmap.org/search?format=json&addressdetails=1&limit=10&q=" + inp.value + "%2CIndonesia";
                        xmlhttp.onreadystatechange = function () {
                            if (this.readyState == 4 && this.status == 200) {
                                var myArr = JSON.parse(this.responseText);
                                myFunction(myArr);
                            }
                        };
                        xmlhttp.open("GET", url, true);
                        xmlhttp.send();
                    }
                </script>
            </div>
        </section>

        <!-- ======= Pendaftaran ======= -->
        <section id="pendaftaran" class="pendaftaran grid place-content-center">

            <div class="section-title mb-3">
                <h3>Pendaftaran <span>AiR</span></h3>
                <p>Alur singkat proses pengajuan permohonan rekomendasi teknis untuk pengguna baru sebagai berikut:</p>
            </div>

            <div class="row">
                <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="icon-box">
                        <span class="material-icons-round icon">pin_drop</span>
                        <h4 class="title"><a>Cek Lokasi</a></h4>
                        <p class="description">Pastikan lokasi permohonan berada pada Wilayah BBWS Serayu Opak</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="icon-box">
                        <span class="material-icons-round icon">person_add</span>
                        <h4 class="title"><a>Buat Akun</a></h4>
                        <p class="description">Buat akun untuk menggunakan aplikasi E-Rekomtek</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="icon-box">
                        <span class="material-icons-round icon">badge</span>
                        <h4 class="title"><a>Lengkapi Identitas</a></h4>
                        <p class="description">Lengkapi data diri pemohon beserta identitas perusahaan</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="icon-box">
                        <span class="material-icons-round icon">description</span>
                        <h4 class="title"><a>Ajukan Permohonan</a></h4>
                        <p class="description">Ajukan Permohonan dengan melengkapi data-data yang dibutuhkan</p>
                    </div>
                </div>
            </div>

            <div class="text-center my-5">
                <a class="tombol" href="register">Mulai Buat Permohonan</a>
            </div>
        </section>
        <!-- End Pendaftaran -->

        <!-- ======= Quotes ======= -->
        <div class="quote-container">
            {{-- <div class=" p-10 lg:px-80 md:py-20 md:my-20"> --}}
                <div class="p-10 mx-3 text-gray-800 bg-white rounded-2xl shadow">
                    <div class="h-3 text-2xl md:text-3xl text-left text-gray-600">“</div>
                    <p class="lg:px-4 text-xl md:text-2xl text-center text-gray-600 font-bold">
                        Bijaksanalah Menjalankan Peraturan dan Jangan Pernah Membijaksanai Peraturan
                    </p>
                    <div class="h-3 text-2xl md:text-3xl text-right text-gray-600">”</div>
                </div>
            {{-- </div> --}}
        </div>

        <!-- ======= Kontak ======= -->
        <section id="contact" class="contact grid place-content-center">

                <div class="section-title mb-5">
                    <h3>Hubungi <span>Kami</span></h3>
                    {{-- <p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas
                        atque vitae autem.</p> --}}
                </div>

                <div class="grid md:grid-cols-3 gap-4">
                    <div class="phone">
                        <span class="material-icons-round icon">place</span>
                        <h4>Alamat:</h4>
                        <p>Jl. Solo Km. 6, Ngentak, Caturtunggal, Sleman, Kabupaten Sleman, Daerah Istimewa
                            Yogyakarta 55281</p>
                    </div>

                    <div class="phone">
                        <span class="material-icons-round icon">phone</span>
                        <h4>Telp.:</h4>
                        <p>0821 3806 2006 ( WA Only )</p>
                    </div>

                    <div class="email">
                        <span class="material-icons-round icon">email</span>
                        <h4>Email:</h4>
                        <p>rekomendasiteknis.bbwsso@gmail.com </p>
                    </div>
                </div>

                <div class="row">
                    <div class="footer-links lg:px-40">
                        <div class="icon-box" style="padding: 10px 10px">
                            <iframe style="border:0; width: 100%; height: 270px;"
                                src="
                        https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d650.1321481759311!2d110.40863565700296!3d-7.782994278964371!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a5a67685bbacd%3A0xe4cd87d3f827e9da!2sKantor%20BBWS%20Serayu%20Opak!5e0!3m2!1sen!2sid!4v1644824624875!5m2!1sen!2sid"
                                frameborder="0" allowfullscreen></iframe>
                        </div>
                    </div>

                </div>
        </section><!-- End Kontak -->
    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">

        <div class="container d-md-flex py-4">

            <div class="me-md-auto text-center text-md-start">
                <div class="copyright">
                    &copy; <script>
                        document.write(new Date().getFullYear())

                    </script> <strong><span>Rekomtek BBWS Serayu Opak</span></strong>.
                </div>
            </div>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center">
        <span class="material-icons-round icon">keyboard_double_arrow_up</span>
    </a>

    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>

    <script type="text/javascript" src="custom/js/homepage.js"></script>

</body>

</html>
