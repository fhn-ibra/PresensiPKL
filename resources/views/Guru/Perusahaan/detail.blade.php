@extends('layouts.admin.tabler')

@section('content')

<div class="page-body">

    <div class="container-xl">
        <div class="card card-lg">

            <div class="card-body">

                <div class="row">

                    <div class="col-6">
                        <p class="h3">Company</p>
                        <address>
                            Street Address<br>
                            State, City<br>
                            Region, Postal Code<br>
                            ltd@example.com
                        </address>
                    </div>
                    <div class="col-6 text-end">
                        <div class="col-12">
                            <a href="#" class="btn btn-primary" id="btnTambahCabang">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus"
                                    width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M12 5l0 14"></path>
                                    <path d="M5 12l14 0"></path>
                                </svg>
                                Tambah Data
                            </a>
                        </div>
                    </div>
                    <div class="col-12 my-5">
                        <h1>Invoice INV/001/15</h1>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-transparent">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 1%"></th>
                                <th>Product</th>
                                <th class="text-center" style="width: 1%">Qnt</th>
                                <th class="text-end" style="width: 1%">Unit</th>
                                <th class="text-end" style="width: 1%">Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center">1</td>
                                <td>
                                    <p class="strong mb-1">Logo Creation</p>
                                    <div class="text-secondary">Logo and business cards design</div>
                                </td>
                                <td class="text-center">1</td>
                                <td class="text-end">$1.800,00</td>
                                <td class="text-end">$1.800,00</td>
                            </tr>
                            <tr>
                                <td class="text-center">2</td>
                                <td>
                                    <p class="strong mb-1">Online Store Design &amp; Development</p>
                                    <div class="text-secondary">Design/Development for all popular modern browsers</div>
                                </td>
                                <td class="text-center">1</td>
                                <td class="text-end">$20.000,00</td>
                                <td class="text-end">$20.000,00</td>
                            </tr>
                            <tr>
                                <td class="text-center">3</td>
                                <td>
                                    <p class="strong mb-1">App Design</p>
                                    <div class="text-secondary">Promotional mobile application</div>
                                </td>
                                <td class="text-center">1</td>
                                <td class="text-end">$3.200,00</td>
                                <td class="text-end">$3.200,00</td>
                            </tr>
                            <tr>
                                <td colspan="4" class="strong text-end">Subtotal</td>
                                <td class="text-end">$25.000,00</td>
                            </tr>
                            <tr>
                                <td colspan="4" class="strong text-end">Vat Rate</td>
                                <td class="text-end">20%</td>
                            </tr>
                            <tr>
                                <td colspan="4" class="strong text-end">Vat Due</td>
                                <td class="text-end">$5.000,00</td>
                            </tr>
                            <tr>
                                <td colspan="4" class="font-weight-bold text-uppercase text-end">Total Due</td>
                                <td class="font-weight-bold text-end">$30.000,00</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <p class="text-secondary text-center mt-5">Thank you very much for doing business with us.
                    We look forward to working with you again!</p>
            </div>
        </div>
    </div>
</div>
<div class="modal modal-blur fade" id="modal-inputcabang" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit/h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/perusahaan" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="input-icon mb-3">
                                <span class="input-icon-addon">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-building-skyscraper">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M3 21l18 0" />
                                        <path d="M5 21v-14l8 -4v18" />
                                        <path d="M19 21v-10l-6 -4" />
                                        <path d="M9 9l0 .01" />
                                        <path d="M9 12l0 .01" />
                                        <path d="M9 15l0 .01" />
                                        <path d="M9 18l0 .01" />
                                    </svg>
                                </span>
                                <input required type="text" value="" id="nama_perusahaan" class="form-control"
                                    placeholder="Nama Perusahaan" name="nama_perusahaan">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="input-icon mb-3">
                                <span class="input-icon-addon">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-map-2">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M12 18.5l-3 -1.5l-6 3v-13l6 -3l6 3l6 -3v7.5" />
                                        <path d="M9 4v13" />
                                        <path d="M15 7v5.5" />
                                        <path
                                            d="M21.121 20.121a3 3 0 1 0 -4.242 0c.418 .419 1.125 1.045 2.121 1.879c1.051 -.89 1.759 -1.516 2.121 -1.879z" />
                                        <path d="M19 18v.01" />
                                    </svg>
                                </span>
                                <input required type="text" id="alamat_perusahaan" value="" class="form-control"
                                    name="alamat_perusahaan" placeholder="Alamat Perusahaan">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="input-icon mb-3">
                                <span class="input-icon-addon">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user"
                                        width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor" fill="none" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M12 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"></path>
                                        <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                                    </svg>
                                </span>
                                <input required type="text" id="pj_perusahaan" class="form-control" name="pj_perusahaan"
                                    placeholder="Nama Penanggung Jawab Perusahaan">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="input-icon mb-3">
                                <span class="input-icon-addon">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-brand-whatsapp">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M3 21l1.65 -3.8a9 9 0 1 1 3.4 2.9l-5.05 .9" />
                                        <path
                                            d="M9 10a.5 .5 0 0 0 1 0v-1a.5 .5 0 0 0 -1 0v1a5 5 0 0 0 5 5h1a.5 .5 0 0 0 0 -1h-1a.5 .5 0 0 0 0 1" />
                                    </svg>
                                </span>
                                <input required type="text" class="form-control" name="no_pj"
                                    placeholder="No Telp Penanggung Jawab">
                            </div>
                        </div>
                    </div>
                    <div class="col-12">

                        <div class="form-group">

                            <select name="guru" class="form-select" required>
                                <option value="" selected disabled>Nama Guru</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-12">
                            <div class="form-group">
                                <button class="btn btn-primary w-100 mt-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-send"
                                        width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor" fill="none" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M10 14l11 -11"></path>
                                        <path
                                            d="M21 3l-6.5 18a.55 .55 0 0 1 -1 0l-3.5 -7l-7 -3.5a.55 .55 0 0 1 0 -1l18 -6.5">
                                        </path>
                                    </svg>
                                    Simpan
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<!-- Libs JS -->
<!-- Tabler Core -->
<script src="./dist/js/tabler.min.js?1692870487" defer></script>
<script src="./dist/js/demo.min.js?1692870487" defer></script>
@endsection
@push('myscript')
<script>
$(function() {
    $("#btnTambahCabang").click(function() {
        $("#modal-inputcabang").modal("show");
    });



    $("#frmCabang").submit(function() {
        var nama_perusahaan = $("#nama_perusahaan").val();
        var alamat_perusahaan = $("#alamat_perusahaan").val();
        var pj_perusahaan = $("#pj_perusahaan").val();
        var no_pj = $("#no_pj").val();
        var Guru = $("#Guru").val();


        if (nama_perusahaan == "") {
            Swal.fire({
                title: 'Warning!',
                text: 'Nama Perusahaan Harus diisi!',
                icon: 'warning',
                confirmButtonText: 'Ok'
            }).then((result) => {
                $("#nama_perusahaan").focus();
            });

            return false;
        } else if (alamat_perusahaan == "") {
            Swal.fire({
                title: 'Warning!',
                text: 'Alamat Perusahaan Harus Diisi !',
                icon: 'warning',
                confirmButtonText: 'Ok'
            }).then((result) => {
                $("#alamat_perusahaan").focus();
            });

            return false;
        } else if (no_pj == "") {
            Swal.fire({
                title: 'Warning!',
                text: 'Nomor Penanggung Jawab Perusahaan Harus Diisi !',
                icon: 'warning',
                confirmButtonText: 'Ok'
            }).then((result) => {
                $("#no_pj").focus();
            });

            return false;
        } else if (Guru == "") {
            Swal.fire({
                title: 'Warning!',
                text: 'Nama Guru Harus Diisi !',
                icon: 'warning',
                confirmButtonText: 'Ok'
            }).then((result) => {
                $("#Guru").focus();
            });
            return false;
        } else if (radius_cabang == "") {
            // alert('Nik Harus Diisi');
            Swal.fire({
                title: 'Warning!',
                text: 'Nomor Penanggung Jawab Harus Diisi !',
                icon: 'warning',
                confirmButtonText: 'Ok'
            }).then((result) => {
                $("#no_pj").focus();
            });

            return false;
        }
    });
});
</script>
@endpush