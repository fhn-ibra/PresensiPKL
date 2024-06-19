@extends('layouts.presensi')
@section('header')
    <!-- App Header -->
    <div class="appHeader bg-primary text-light">
        <div class="left">
            <a href="javascript:;" class="headerButton goBack">
                <ion-icon name="chevron-back-outline"></ion-icon>
            </a>
        </div>
        <div class="pageTitle">Tidak Hadir</div>
        <div class="right"></div>
    </div>
    <!-- * App Header -->
@endsection
@section('content')
<div class="row" style="margin-top: 60px">
    <div class="col">
      <form id="absenForm">
        <div class="form-group">
          <label for="foto">Foto Surat</label>
          <input type="file" id="foto" name="foto" class="form-control" accept="image/*" required>
        </div>
        <div class="form-group">
          <label for="lokasi">Keterangan</label>
          <input type="text" id="lokasi" name="lokasi" class="form-control">
        </div>
        <div class="row">
          <div class="col">
            <button type="submit" id="kirimAbsen" class="btn btn-primary btn-block">
              <ion-icon name="checkmark-outline"></ion-icon>
              Kirim Surat
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection