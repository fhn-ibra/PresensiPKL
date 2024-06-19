<!-- App Bottom Menu -->
<div class="appBottomMenu">
    <a href="/home" class="item {{ $title == 'Home' ? 'active' : '' }}">
        <div class="col">
            <ion-icon name="home-outline"></ion-icon>
            <strong>Home</strong>
        </div>
    </a>
    <a href="/option" class="item {{ $title == 'Absensi' ? 'active' : '' }}">
        <div class="col">
            <ion-icon name="camera-outline"></ion-icon>
            <strong>Absen</strong>  
        </div>
    </a>
    {{-- @if (Auth::guard('karyawan')->user()->status_jam_kerja == 1)
        <a href="/presensi/null/create" class="item {{ request()->is('presensi/null/create') ? 'active' : '' }}">
            <div class="col">
                <ion-icon name="camera-outline"></ion-icon>
                <strong>Absen</strong>
            </div>
        </a>
    @else
        <a href="/presensi/pilihjamkerja" class="item {{ request()->is('presensi/pilihjamkerja') ? 'active' : '' }}">
            <div class="col">
                <ion-icon name="camera-outline"></ion-icon>
                <strong>Absensi</strong>
            </div>
        </a>
    @endif --}}
    <a href="/histori" class="item {{ $title == 'Histori' ? 'active' : '' }}">
        <div class="col">
            <ion-icon name="document-text-outline" role="img" class="md hydrated" aria-label="document text outline">
            </ion-icon>
            <strong>Histori</strong>
        </div>
    </a>
</div>
<!-- * App Bottom Menu -->
