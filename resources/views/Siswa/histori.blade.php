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
            <h3 id="name">{{ Auth::user()->nama }}</h3>
            <span id="role">{{ Auth::user()->siswa->first()->kelas }}</span>
            <p style="margin-top: 15px">
                <span id="role">{{ Auth::user()->siswa->first()->perusahaan->first()->nama }}</span>
            </p>
        </div>
    </div>
</div>
    <div class="row">
        <div class="col">
            <div class="row" style="margin-top:14px">
                <div class="col-10">
                    <form method="GET">        
                        <div class="form-group">
                            <select name="bulan" id="bulan" class="form-control selectmaterialize">
                                <option value="6" {{ $bulan == 6 ? 'selected' : '' }}>Juni</option>
                                <option value="7" {{ $bulan == 7 ? 'selected' : '' }}>Juli</option>
                                <option value="8" {{ $bulan == 8 ? 'selected' : '' }}>Agustus</option>
                                <option value="9" {{ $bulan == 9 ? 'selected' : '' }}>September</option>
                                <option value="10" {{ $bulan == 10 ? 'selected' : '' }}>Oktober</option>
                                <option value="11" {{ $bulan == 11 ? 'selected' : '' }}>November</option>
                                <option value="12" {{ $bulan == 12 ? 'selected' : '' }}>Desember</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-2">
                        <button type="submit" class="btn btn-primary w-100">
                            <ion-icon name="search"></ion-icon>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <table>
        <tr>
          <th>No</th>
          <th>Tanggal</th>
          <th>Keterangan</th>
        </tr>
        <?php $no = 1; ?>
        @foreach ($absen as $item)
        <tr>
          <td>{{ $no++ }}</td>
          <td>{{ $item->tanggal }}</td>
          <td class="{{ $item->status == 'Hadir' ? 'hadir' : 'tidak-hadir' }}">{{ $item->status }}</td>
        </tr>
        @endforeach
      </table>
    <div class="row mt-2" style="position: fixed; width:100%; margin:auto; overflow-y:scroll; height:430px">
        <div class="col" id="showhistori"></div>
    </div>
@endsection
