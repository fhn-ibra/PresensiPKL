@extends('layouts.presensi')
@section('header')
    <!-- App Header -->
    <div class="appHeader bg-primary text-light">
        <div class="left">
            <a href="javascript:;" class="headerButton goBack">
                <ion-icon name="chevron-back-outline"></ion-icon>
            </a>
        </div>
        <div class="pageTitle">Histori Presensi</div>
        <div class="right"></div>
    </div>
    <!-- * App Header -->

    <style>
    #user-sektion {
        height: 180px;
        background-color: #CF850F;
        padding: 20px;
        border-bottom-left-radius: 15px;
        border-bottom-right-radius: 15px; 
    }

    #user-detail {
        margin-top: 20px;
        display: flex;
    }

    #user-info {
        margin-left: 30px !important;
        line-height: 2px;
    }

    #name {
        color: white;
    }

    #role {
        color: white;
    }

    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }

    .hadir {
        color: green;
    }

    .tidak-hadir {
        color: red;
    }
    </style>
@endsection
@section('content')
<div class="section" id="user-sektion">
    <div id="user-detail" style="margin-top: 70px">
        <div id="user-info">
            {{-- TODO: Ubah menjadi Info Siswa --}}
            <h3 id="name">Revaldo Parikesit</h3>
            <span id="role">XI PPLG 3</span>
            <p style="margin-top: 15px">
                <span id="role">PT. Komatsu Marketing And Support</span>
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
    <div class="row">
        <div class="col">
            <div class="row" style="margin-top:14px">
                <div class="col-10">
                    <div class="form-group">
                        <select name="bulan" id="bulan" class="form-control selectmaterialize">
                            <option value="">Bulan</option>
                            {{-- @for ($i = 1; $i <= 12; $i++)
                                <option {{ Request('bulan') == $i ? 'selected' : '' }} value="{{ $i }}">
                                    {{ $namabulan[$i] }}</option>
                            @endfor --}}
                        </select>
                    </div>
                </div>
                <div class="col-2">
                    <button class="btn btn-primary w-100" id="getdata">
                        <ion-icon name="search"></ion-icon>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <table>
        <tr>
          <th>No</th>
          <th>Tanggal</th>
          <th>Keterangan</th>
        </tr>
        <tr>
          <td>1</td>
          <td>12-06-2024</td>
          <td class="{{ 'Hadir' == 'Hadir' ? 'hadir' : 'tidak-hadir' }}">Hadir</td>
        </tr>
        <tr>
          <td>2</td>
          <td>13-06-2024</td>
          <td class="{{ 'Tidak Hadir' == 'Hadir' ? 'hadir' : 'tidak-hadir' }}">Tidak Hadir</td>
        </tr>
      </table>
    <div class="row mt-2" style="position: fixed; width:100%; margin:auto; overflow-y:scroll; height:430px">
        <div class="col" id="showhistori"></div>
    </div>
@endsection


@push('myscript')
    <script>
        $(function() {
            $("#getdata").click(function(e) {
                var bulan = $("#bulan").val();
                var tahun = $("#tahun").val();
                $.ajax({
                    type: 'POST',
                    url: '/gethistori',
                    data: {
                        _token: "{{ csrf_token() }}",
                        bulan: bulan,
                        tahun: tahun
                    },
                    cache: false,
                    success: function(respond) {
                        $("#showhistori").html(respond);
                    }
                });
            });
        });
    </script>
@endpush
