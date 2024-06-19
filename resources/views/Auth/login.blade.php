<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport"content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="theme-color" content="#004AAD">
    <title>Login - Absensi PKL</title>
    <meta name="description" content="Mobilekit HTML Mobile UI Kit">
    <meta name="keywords" content="SIAKAD PKL SMK PRESTASI PRIMA" />
    <link rel="icon" type="image/png" href="{{ asset('icon-512.png') }}" sizes="32x32">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('icon-512.png') }}">

</head>
<style>
    /* Google Fonts - Poppins */
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap');

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
    }

    .container {
        height: 100vh;
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        column-gap: 30px;
    }

    .form {
        position: absolute;
        max-width: 600px;
        width: 100%;
        padding: 30px;
        border-radius: 6px;
    }

    .form.signup {
        opacity: 0;
        pointer-events: none;
    }

    .forms.show-signup .form.signup {
        opacity: 1;
        pointer-events: auto;
    }

    .forms.show-signup .form.login {
        opacity: 0;
        pointer-events: none;
    }

    header {
        font-size: 28px;
        font-weight: 600;
        color: #232836;
        text-align: center;
    }

    form {
        margin-top: 30px;
    }

    .form .field {
        position: relative;
        height: 50px;
        width: 100%;
        margin-top: 20px;
        border-radius: 6px;
    }

    .field input,
    .field button {
        height: 100%;
        width: 100%;
        border: none;
        font-size: 16px;
        font-weight: 400;
        border-radius: 6px;
    }

    .field input {
        outline: none;
        padding: 0 15px;
        border: 1px solid#CACACA;
    }

    .field input:focus {
        border-bottom-width: 2px;
    }

    .eye-icon {
        position: absolute;
        top: 50%;
        right: 10px;
        transform: translateY(-50%);
        font-size: 18px;
        color: #8b8b8b;
        cursor: pointer;
        padding: 5px;
    }

    .field button {
        color: #fff;
        background-color: #0171d3;
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .field button:hover {
        background-color: #016dcb;
    }

    .form-link {
        text-align: center;
        margin-top: 10px;
    }

    .form-link span,
    .form-link a {
        font-size: 14px;
        font-weight: 400;
        color: #232836;
    }

    .form a {
        color: #0171d3;
        text-decoration: none;
    }

    .form-content a:hover {
        text-decoration: underline;
    }

    .line {
        position: relative;
        height: 1px;
        width: 100%;
        margin: 36px 0;
        background-color: #d4d4d4;
    }

    .line::before {
        content: 'Or';
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: #FFF;
        color: #8b8b8b;
        padding: 0 15px;
    }

    .media-options a {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    a.facebook {
        color: #fff;
        background-color: #4267b2;
    }

    a.facebook .facebook-icon {
        height: 28px;
        width: 28px;
        color: #0171d3;
        font-size: 20px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #fff;
    }

    .facebook-icon,
    img.google-img {
        position: absolute;
        top: 50%;
        left: 15px;
        transform: translateY(-50%);
    }

    img.google-img {
        height: 20px;
        width: 20px;
        object-fit: cover;
    }

    a.google {
        border: 1px solid #CACACA;
    }

    a.google span {
        font-weight: 500;
        opacity: 0.6;
        color: #232836;
    }

    @media screen and (max-width: 400px) {
        .form {
            padding: 20px 10px;
        }

    }
</style>
<html lang="en">

<head>

<body>
    <section class="container forms">
        <div class="form login">
        <img src="{{ asset('icon-512.png') }}" alt="Logo" style="width: 100px; height: auto; display: block; margin: 0 auto 10px;">
            <div class="form-content">
                <header>Login Absensi PKL</header>



            </div>



            <div class="media-options">
                <!-- Pakai API GOOGLE -->
                <a href="/auth/google" class="field google">
                <img src="{{ asset('google.png') }}" alt="Google Image" class="google-img">
                <span><b>Login Memakai Akun Sekolah</b></span>
                </a>
            </div>


            {{-- <div class="media-options">
                <a href="#" class="field facebook">
                    <span>Manual Book</span>
                </a>
            </div> --}}
            <br>


            <center>
                <div class="row">
                    <div class="d-flex justify-content-center"><b>Created by Orens Solusion Prestasi Prima</b>
            </div>
        </center>
        </div>
           
        </div>


  

    <!-- ///////////// Js Files ////////////////////  -->
    <!-- Jquery -->
    <script src="{{ asset('assets/js/lib/jquery-3.4.1.min.js') }}"></script>
    <!-- Bootstrap-->
    <script src="{{ asset('assets/js/lib/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/lib/bootstrap.min.js') }}"></script>
    <!-- Ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@5.0.0/dist/ionicons/ionicons.js"></script>
    <!-- Owl Carousel -->
    <script src="{{ asset('assets/js/plugins/owl-carousel/owl.carousel.min.js') }}"></script>
    <!-- jQuery Circle Progress -->
    <script src="{{ asset('assets/js/plugins/jquery-circle-progress/circle-progress.min.js') }}"></script>
    <!-- Base Js File -->
    <script src="{{ asset('assets/js/base.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if (!empty(session('error')))
    <script>
        Swal.fire({
            icon: "error",
            title: "Oops..",
            text: "{{ session('error') }}"
        });
    </script>
@endif
</body>


</body>

</html>
