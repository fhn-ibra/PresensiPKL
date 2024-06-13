@extends('layouts.admin.tabler')
@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <!-- Page pre-title -->
                <div class="page-pretitle">
                    SIAKAD PKL SMK PRESTASI PRIMA
                </div>
                <h2 class="page-title">
                    Data Siswa
                    </h2>
                        <div class="page-pretitle">
                            Tanggal wfae9929
                        </div>
            </div>

        </div>
    </div>
</div>
<div class="page-body">
    <div class="container-xl">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                {{-- @if (Session::get('success'))
                                <div class="alert alert-success">
                                    {{ Session::get('success') }}
                                </div>
                                @endif

                                @if (Session::get('warning'))
                                <div class="alert alert-warning">
                                    {{ Session::get('warning') }}
                                </div>
                                @endif --}}
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-12">
                                <form action="/karyawan" method="GET">
                                    <div class="row">

                                        <div class="col-2">
                                            <div class="form-group">
                                                <select name="kode_dept" id="kode_dept" class="form-select">
                                                    <option value="">Semua Kelas</option>
                                                    <option value="XI BCF 1">XI BCF 1</option>
                                                    <option value="XI BCF 2">XI BCF 2</option>
                                                    <option value="XI DKV 1">XI DKV 1</option>
                                                    <option value="XI DKV 2">XI DKV 2</option>
                                                    <option value="XI DKV 3">XI DKV 3</option>
                                                    <option value="XI PPLG 1">XI PPLG 1</option>
                                                    <option value="XI PPLG 2">XI PPLG 2</option>
                                                    <option value="XI PPLG 3">XI PPLG 3</option>
                                                    <option value="XI TKJT 1">XI TKJT 1</option>
                                                    <option value="XI TKJT 2">XI TKJT 2</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <select name="kode_cabang" id="kode_cabang" class="form-select">
                                                    <option value="">Semua Perusahaan</option>
                                                    @foreach ($perusahaan as $item)
                                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <select name="kode_dept" id="kode_dept" class="form-select">
                                                    <option value="" selected>Hari Ini</option>
                                                    <option value="7">Juli</option>
                                                    <option value="8">Agustus</option>
                                                    <option value="9">September</option>
                                                    <option value="10">Oktober</option>
                                                    <option value="11">November</option>
                                                    <option value="12">Desember</option>
                                                    <!-- foreach -->
                                                    <!-- endforeach -->
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="icon icon-tabler icon-tabler-search" width="24"
                                                        height="24" viewBox="0 0 24 24" stroke-width="2"
                                                        stroke="currentColor" fill="none" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path>
                                                        <path d="M21 21l-6 -6"></path>
                                                    </svg>
                                                    Cari
                                                </button>
                                                <button type="submit" class="btn btn-success">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="icon icon-tabler icons-tabler-outline icon-tabler-printer">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path
                                                            d="M17 17h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-14a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h2" />
                                                        <path d="M17 9v-4a2 2 0 0 0 -2 -2h-6a2 2 0 0 0 -2 2v4" />
                                                        <path
                                                            d="M7 13m0 2a2 2 0 0 1 2 -2h6a2 2 0 0 1 2 2v4a2 2 0 0 1 -2 2h-6a2 2 0 0 1 -2 -2z" />
                                                    </svg>
                                                    Excel
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-12">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Kelas</th>
                                            <th><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="icon icon-tabler icons-tabler-outline icon-tabler-building-skyscraper">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M3 21l18 0" />
                                                    <path d="M5 21v-14l8 -4v18" />
                                                    <path d="M19 21v-10l-6 -4" />
                                                    <path d="M9 9l0 .01" />
                                                    <path d="M9 12l0 .01" />
                                                    <path d="M9 15l0 .01" />
                                                    <path d="M9 18l0 .01" />
                                                </svg>Nama Perusahaan</th>
                                            <th>Guru Pembimbing</th>
                                            <th>Status</th>
                                            <th> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="icon icon-tabler icons-tabler-outline icon-tabler-calendar-clock">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path
                                                        d="M10.5 21h-4.5a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v3" />
                                                    <path d="M16 3v4" />
                                                    <path d="M8 3v4" />
                                                    <path d="M4 11h10" />
                                                    <path d="M18 18m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                                                    <path d="M18 16.5v1.5l.5 .5" />
                                                </svg> Jam Masuk</th>
                                            <th>Foto</th>

                                            <th> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="icon icon-tabler icons-tabler-outline icon-tabler-calendar-clock">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path
                                                        d="M10.5 21h-4.5a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v3" />
                                                    <path d="M16 3v4" />
                                                    <path d="M8 3v4" />
                                                    <path d="M4 11h10" />
                                                    <path d="M18 18m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                                                    <path d="M18 16.5v1.5l.5 .5" />
                                                </svg> Jam Keluar</th>
                                            <th>Foto</th>
                                            <th>Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr>
                                            {{-- TODO: Ubah Kolom Sesuai Line 119 --}}
                                            <td>1</td>
                                            <td>Erlangga Tamvan 150 cc </td>
                                            <td> XI PPLG 3 </td>
                                            <td> INDI Technology </td>
                                            <td> Sir Ridwan </td>
                                            <td> <span class="badge bg-green-lt">Hadir</span></td>
                                            <td> 07.30</td>
                                            <td> ... </td>
                                            <td> 16.00</td>
                                            <td> ...</td>
                                            <td> - </td>

                                    </tbody>
                                </table>
                                <!-- next pagination -->
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

</div>

@endsection