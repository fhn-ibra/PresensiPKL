@extends('layouts.presensi')
@section('header')
    <!-- App Header -->
    <div class="appHeader bg-primary text-light">
        <div class="left">
            <a href="javascript:;" class="headerButton goBack">
                <ion-icon name="chevron-back-outline"></ion-icon>
            </a>
        </div>
        <div class="pageTitle">E-Presensi</div>
        <div class="right"></div>
    </div>
    <!-- * App Header -->
    <style>
        .webcam-capture,
        .webcam-capture video {
            display: inline-block;
            width: 100% !important;
            margin: auto;
            height: auto !important;
            border-radius: 15px;

        }

        #map {
            height: 200px;
        }

        .jam-digital-malasngoding {

            background-color: #27272783;
            position: absolute;
            top: 65px;
            right: 10px;
            z-index: 9999;
            width: 150px;
            border-radius: 10px;
            padding: 5px;
        }

        .jam-digital-malasngoding p {
            color: #fff;
            font-size: 16px;
            text-align: left;
            margin-top: 0;
            margin-bottom: 0;
        }
    </style>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>
@endsection
@section('content')
    <div class="row" style="margin-top: 60px">
        <div class="col">
            <input type="hidden" id="lokasi">
            <div class="webcam-capture"></div>
        </div>
    </div>
    {{-- TODO: Fix Jam Digital Untuk Timestamp --}}
    <div class="jam-digital-malasngoding">
        <p>{{ $hari }}</p>
        <p id="jam"></p>
    </div>
    {{-- <div class="jam-digital-malasngoding">
        <p>{{ $hariini }}</p>
        <p id="jam"></p>
        <p>{{ $jamkerja->nama_jam_kerja }}</p>
        <p>Mulai : {{ date('H:i', strtotime($jamkerja->awal_jam_masuk)) }}</p>
        <p>Masuk : {{ date('H:i', strtotime($jamkerja->jam_masuk)) }}</p>
        <p>Akhir : {{ date('H:i', strtotime($jamkerja->akhir_jam_masuk)) }}</p>
        <p>Pulang : {{ date('H:i', strtotime($jamkerja->jam_pulang)) }}</p>
    </div> --}}
    <div class="row">
        <div class="col">
            <div class="row" style="margin-top:14px">
                <div class="col-12">
                    <div class="form-group">
                        <select name="bulan" id="bulan" class="form-control selectmaterialize">
                            <option value="">Hadir</option>
                            <option value="">Tidak Hadir</option>
                            {{-- TODO: Ubah Menjadi Tidak Hadir --}}
                            {{-- @for ($i = 1; $i <= 12; $i++)
                                <option {{ Request('bulan') == $i ? 'selected' : '' }} value="{{ $i }}">
                                    {{ $namabulan[$i] }}</option>
                            @endfor --}}
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            {{-- TODO: Fix Absen --}}
            <button id="takeabsen" class="btn btn-primary btn-block">
                <ion-icon name="camera-outline"></ion-icon>
                Absen Masuk
            </button>
            {{-- @if ($cek > 0)
                <button id="takeabsen" class="btn btn-danger btn-block">
                    <ion-icon name="camera-outline"></ion-icon>
                    Absen Pulang
                </button>
            @else
                <button id="takeabsen" class="btn btn-primary btn-block">
                    <ion-icon name="camera-outline"></ion-icon>
                    Absen Masuk
                </button>
            @endif --}}
        </div>
    </div>
    <div class="row mt-2">
        <div class="col">
            <div id="map"></div>
        </div>
    </div>

    <audio id="notifikasi_in">
        <source src="{{ asset('assets/sound/notifikasi_in.mp3') }}" type="audio/mpeg">
    </audio>
    <audio id="notifikasi_out">
        <source src="{{ asset('assets/sound/notifikasi_out.mp3') }}" type="audio/mpeg">
    </audio>
    <audio id="radius_sound">
        <source src="{{ asset('assets/sound/radius.mp3') }}" type="audio/mpeg">
    </audio>
@endsection

@push('myscript')
    <script type="text/javascript">
        window.onload = function() {
            jam();
        }

        function jam() {
            var e = document.getElementById('jam'),
                d = new Date(),
                h, m, s;
            h = d.getHours();
            m = set(d.getMinutes());
            s = set(d.getSeconds());

            e.innerHTML = h + ':' + m + ':' + s;

            setTimeout('jam()', 1000);
        }

        function set(e) {
            e = e < 10 ? '0' + e : e;
            return e;
        }
    </script>
    <script>
        var notifikasi_in = document.getElementById('notifikasi_in');
        var notifikasi_out = document.getElementById('notifikasi_out');
        var radius_sound = document.getElementById('radius_sound');
        Webcam.set({
            height: 480,
            width: 640,
            image_format: 'jpeg',
            jpeg_quality: 80
        });

        Webcam.attach('.webcam-capture');

        var lokasi = document.getElementById('lokasi');
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(successCallback, errorCallback, { enableHighAccuracy: true });
        }

        function successCallback(position) {
            // var userLatLng = L.latLng(position.coords.latitude, position.coords.longitude); 
            // var centerLatLng = L.latLng(-6.3670052, 106.9080296); 
            // var radius = 300; 
            // var distance = userLatLng.distanceTo(centerLatLng);
            // if (distance <= radius) {
            //     console.log("Jarak : " + distance);
            // } else {
            //     console.log("Jarak Luar : " + distance);
            //     Swal.fire({
            //                 title: 'Error !',
            //                 text: 'Jarak diluar jangkauan kantor',
            //                 icon: 'error'
            //             })
            // }
            lokasi.value = position.coords.latitude + "," + position.coords.longitude;
            console.log(lokasi.value)
            var map = L.map('map').setView([position.coords.latitude, position.coords.longitude], 18);
            L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
                maxZoom: 20,
                subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
            }).addTo(map);
            var marker = L.marker([position.coords.latitude, position.coords.longitude]).addTo(map);
            // var circle = L.circle([-6.3670052, 106.9080280], {
            //     color: 'red',
            //     fillColor: '#f03',
            //     fillOpacity: 0.5,
            //     radius: 300
            // }).addTo(map);
        }

        function errorCallback() {

        }

        $("#takeabsen").click(function(e) {
            Webcam.snap(function(uri) {
                image = uri;
            });
            var lokasi = $("#lokasi").val();
            $.ajax({
                type: 'POST',
                url: '/create',
                data: {
                    _token: "{{ csrf_token() }}",
                    image: image,
                    lokasi: lokasi,
                 },
                cache: false,
                success: function(respond) {
                    console.log(respond);
                    if(respond.absen){
                           Swal.fire({
                            title: 'Berhasil !',
                            text: respond.message,
                            icon: 'success'
                        })  
                    } 
                    if (respond.absen == false) {
                             Swal.fire({
                            title: 'Error !',
                            text: respond.message,
                            icon: 'error'
                        })
                    }
                },
                error: (error) => {
                    console.log(error)
                }
            });

        });
    </script>
@endpush
