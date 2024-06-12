@extends('layouts.presensi')
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
        <a href="/logout" class="logout">
            <ion-icon name="exit-outline"></ion-icon>
        </a>
        <div id="user-detail">
            <div id="user-info">
                {{-- TODO: Ubah menjadi Info Siswa --}}
                <h3 id="user-name">Revaldo Parikesit</h3>
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
    <div class="section mt-2" id="presence-section">
        <div class="todaypresence">
            <div class="row">

                <div class="col-12">
                    <div class="card gradasigreen" style="margin-bottom: 20px">
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
