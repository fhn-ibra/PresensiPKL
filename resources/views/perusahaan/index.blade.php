@extends('layouts.admin.tabler')
@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <!-- Page pre-title -->
                <div class="page-pretitle">
                    Selamat Datang DI SIAKAD PKL SMK PRESTASI PRIMA
                </div>
                <h2 class="page-title">
                    PERUSAHAAN
                </h2>
            </div>
            <button class="btn btn-primary">Tambah Data Perusahaan</button>

        </div>
    </div>
</div>
<div class="page-body">
    <div class="container-xl">

        <div class="row">

            <div class="col-md-6 col-xl-2">
                <a href="your-link-here" class="text-decoration-none">
                    <div class="card card-sm">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <span class="bg-info text-white avatar">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/currency-dollar -->
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-file-text" width="24" height="24"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                                            <path
                                                d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z">
                                            </path>
                                            <path d="M9 9l1 0"></path>
                                            <path d="M9 13l6 0"></path>
                                            <path d="M9 17l6 0"></path>
                                        </svg>
                                    </span>
                                </div>
                                <div class="col">
                                    <div class="text-muted">
                                        Perusahaan
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>



        </div>
    </div>
</div>

</div>
</div>

</div>
@endsection