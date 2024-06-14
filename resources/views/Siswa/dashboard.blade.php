@extends('layouts.presensi')
@section('header')
        <!-- App Header -->
        <div class="appHeader bg-primary text-light">
            <div class="left">
                <a href="javascript:;" class="headerButton goBack">
                    <ion-icon name="chevron-back-outline"></ion-icon>
                </a>
            </div>
            <div class="pageTitle">Home</div>
            <div class="right">
                <a href="/logout" class="logout">
                    <ion-icon name="exit-outline"></ion-icon>
                </a>
            </div>
        </div>
        <!-- * App Header -->
@endsection
@section('content')
    <style>
        .logout {
            position: absolute;
            color: white;
            font-size: 30px;
            text-decoration: none;
            right: 8px;
        }

        .logout:hover {
            color: white;
        } 
    </style>
    <div class="section" id="user-section">
        <div id="user-detail" style="margin-top: 55px">
            <div id="user-info">
                {{-- TODO: Ubah menjadi Info Siswa --}}
                <h3 id="user-name">{{ Auth::user()->nama }}</h3>
                <span id="user-role">XI PPLG 3</span>
                <p style="margin-top: 15px">
                    <span id="user-role">PT. Komatsu Marketing And Support</span>
                </p>
                {{-- <h3 id="user-name">{{ Auth::guard('karyawan')->user()->nama_lengkap }}</h3>
                <span id="user-role">{{ Auth::guard('karyawan')->user()->jabatan }}</span>
                <span id="user-role">({{ $cabang->nama_cabang }})</span>
                <p style="margin-top: 15px">
                    <span id="user-role">({{ $departemen->nama_dept }})</span>
                </p> --}}
            </div>
        </div>
    </div>
    <div class="section" id="menu-section" style="margin-top: 30px">
        <div class="card">
            <div class="card-body text-center">
                <div class="list-menu">
                    <div class="item-menu text-center">
                        <div class="menu-name">
                            <h3 class="text-center">Selamat Datang</h3>
                            <p class="text-center" id="jam"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section mt-2" id="presence-section" style="">
        <div class="todaypresence">
            <div class="row">

                <div class="col-12">
                    <div class="card gradasigreen" style="margin-bottom: 20px; margin-top: 50px">
                        <div class="card-body">
                            <div class="presencecontent">
                                {{-- TODO: Ubah Menjadi Presensi Hadir Siswa --}}
                                <div class="iconpresence">
                                    <img src="{{ asset('img/masuk.jpg') }}" alt="Foto_Masuk" height="75px" width="125px">
                                </div>
                                <div class="presencedetail" style="display: flex; flex-direction: column; align-items: center; justify-content: center;">
                                    <h4 class="presencetitle">Masuk</h4>
                                    <span>07.15</span>
                                </div>
                                {{-- <div class="iconpresence">
                                    @if ($presensihariini != null)
                                        @if ($presensihariini->foto_in != null)
                                            @php
                                                $path = Storage::url('uploads/absensi/' . $presensihariini->foto_in);
                                            @endphp
                                            <img src="{{ url($path) }}" alt="" class="imaged w48">
                                        @else
                                            <ion-icon name="camera"></ion-icon>
                                        @endif
                                    @else
                                        <ion-icon name="camera"></ion-icon>
                                    @endif
                                </div>
                                <div class="presencedetail">
                                    <h4 class="presencetitle">Masuk</h4>
                                    <span>{{ $presensihariini != null ? $presensihariini->jam_in : 'Belum Absen' }}</span>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card gradasired">
                        <div class="card-body">
                            <div class="presencecontent">
                                {{-- TODO: Ubah Menjadi Presensi Pulang Siswa --}}
                                <div class="iconpresence">
                                    <img src="{{ asset('img/masuk.jpg') }}" alt="Foto_Keluar" height="75px" width="125px">
                                </div>
                                <div class="presencedetail" style="display: flex; flex-direction: column; align-items: center; justify-content: center;">
                                    <h4 class="presencetitle">Keluar</h4>
                                    <span>16.45</span>
                                </div>
                                {{-- <div class="iconpresence">
                                    @if ($presensihariini != null && $presensihariini->jam_out != null)
                                        @if ($presensihariini->foto_out != null)
                                            @php
                                                $path = Storage::url('uploads/absensi/' . $presensihariini->foto_out);
                                            @endphp
                                            <img src="{{ url($path) }}" alt="" class="imaged w48">
                                        @else
                                            <ion-icon name="camera"></ion-icon>
                                        @endif
                                    @else
                                        <ion-icon name="camera"></ion-icon>
                                    @endif
                                </div>
                                <div class="presencedetail">
                                    <h4 class="presencetitle">Pulang</h4>
                                    <span>{{ $presensihariini != null && $presensihariini->jam_out != null ? $presensihariini->jam_out : 'Belum Absen' }}</span>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            </div>
        </div>
    </div>
@endsection

@push('myscript')
    <script type="text/javascript">
        window.onload = function() {
            jam();
        }

        function jam() {
        var e = document.getElementById('jam'),
            d = new Date(),
            h, m, s, year, month, date;

        h = d.getHours();
        m = set(d.getMinutes());
        s = set(d.getSeconds());
        year = d.getFullYear();
        month = set(d.getMonth() + 1); // getMonth() returns 0-11
        date = set(d.getDate());

        e.innerHTML = date + '-' + month + '-' + year + ' ' + h + ':' + m + ':' + s;

        setTimeout(jam, 1000); // no need to pass the function name as a string
    }

        function set(e) {
            e = e < 10 ? '0' + e : e;
            return e;
        }
    </script>