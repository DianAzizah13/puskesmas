<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="{{ asset('vendor/bladewind/css/animate.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('vendor/bladewind/css/bladewind-ui.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('vendor/bladewind/js/helpers.js') }}"></script>

    <script src="https://unpkg.com/feather-icons"></script>
    <script async src="https://www.google.com/recaptcha/api.js"></script>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        feather.replace();
    })
    </script>
    <style>
    :root {
        --primary: #0166ff;
        --bg: #fefffe;
        --line: #b6c5ce;
        --bg2: #e3f2fd;
        --secondary: #001233;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        outline: none;
        border: none;
        text-decoration: none;
    }

    body {
        font-family: "Poppins", sans-serif;
        background-color: var(--bg);
        color: #131420;
    }

    /* Navbar */
    .navbar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 1rem 7%;
        background-color: rgba(254, 255, 254, 0.8);
        border-bottom: 3px solid var(--primary);
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        z-index: 9999;
    }

    #navbar-logo {
        float: none;
        display: inline-block;
    }

    .navbar .navbar-nav {
        display: flex;
        align-items: center;
        margin-left: auto;
    }

    .navbar .navbar-nav a {
        color: #131420;
        display: inline-block;
        font-size: 1rem;
        font-weight: 600;
        margin: 0.5rem;
    }

    .navbar .navbar-nav a:hover {
        color: var(--primary);
    }

    .navbar .navbar-nav a::after {
        content: "";
        display: block;
        padding-bottom: 0.5rem;
        border-bottom: o.1rem solid var(--primary);
        transform: scaleX(0);
    }

    .navbar .navbar-nav a:hover::after {
        transform: scaleX(0.5);
    }

    .navbar .register-title h1 {
        color: #48b24c;
    }

    .navbar .register-title h1 span {
        color: #0077b6;
    }

    #menu {
        display: none;
    }

    /* Hero Section*/
    .hero {
        min-height: 65vh;
        display: flex;
        align-items: center;
        position: relative;
    }

    .hero .content {
        padding: 1rem 7%;
        max-width: 50rem;
        position: absolute;
        top: 12rem;
    }

    .hero .content h1 {
        font-size: 2rem;
        line-height: 1;
    }

    .hero .content p {
        font-size: 1rem;
        margin-top: 2rem;
        line-height: 2;
        font-weight: 300;
    }

    .hero .content .cta {
        margin-top: 2rem;
        display: inline-block;
        padding: 1rem 1.7rem;
        font-size: 1;
        color: #fff;
        background-color: var(--primary);
        border-radius: 0.5rem;
    }

    .hero .hero-image {
        padding: 1rem 7%;
        display: flex;
        justify-content: right;
        margin-top: 10%;
    }

    .hero .hero-image img {
        width: 35%;
    }

    /* Service Section*/

    .service {
        padding: 1rem 7%;
    }

    .service .service-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 3rem;
    }

    .service .service-grid,
    .poli .poli-option .poli-grid {
        padding: 2rem 2rem;
        text-align: center;
        background: #ffffff;
        border-radius: 0.7rem;
        border: 1px solid var(--line);
        box-shadow: 1px 1px 3px rgba(1, 1, 3, 0.5);
    }

    .service .service-grid:hover,
    .poli .poli-option .poli-grid:hover {
        border: 1px solid var(--primary);
    }

    .service .service-image,
    .poli .poli-option .poli-image {
        background: var(--bg2);
        width: fit-content;
        margin: auto;
        display: flex;
        justify-content: center;
        padding: 1rem 1.3rem;
        border-radius: 0.5rem;
    }

    .service .service-image img,
    .poli .poli-option .poli-image img {
        width: 40%;
        height: 24;
    }

    .service .service-content {
        text-align: left;
        margin-top: 1rem;
        font-weight: 300;
    }

    .service .service-content h3:hover,
    .poli .poli-option .poli-content h3:hover {
        color: var(--primary);
    }

    /* Queue Home Section */
    .queue {
        padding: 1rem 7%;
    }

    .queue .queue1 {
        display: flex;
        justify-content: center;
    }

    .queue .queue1 .sum-queue,
    .queue .queue-grid {
        display: flex;
        width: 15rem;
        height: 8rem;
        background-color: var(--bg2);
        justify-content: center;
        box-shadow: 1px 1px 3px rgba(1, 1, 3, 0.5);
        border-radius: 0.5rem;
        padding-top: 0.5rem;
        margin-top: 2rem;
    }

    .queue .queue-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 2rem;
    }

    /*Footer*/
    footer {
        background-color: var(--bg2);
        text-align: center;
        padding: 1rem 0rem;
        margin-top: 3rem;
    }

    footer .social {
        padding: 1rem 0;
    }

    footer .social a {
        color: var(--secondary);
        margin: 1rem;
    }

    footer .social a:hover,
    footer .links a:hover {
        color: var(--primary);
    }

    footer .links {
        margin-bottom: 1.4rem;
    }

    footer .links a {
        padding: 0.7rem 0.5rem;
        color: var(--secondary);
        font-size: 90%;
    }

    footer .credit {
        font-size: 0.8rem;
    }

    /* Header Section */
    .header {
        padding: 80px;
        margin-top: 6.9rem;
        text-align: center;
        color: #48b24c;
        font-size: 1.5rem;
        font-weight: 400;
        background-color: var(--bg2);
    }

    .header h1 span {
        color: #0077b6;
    }

    /* Profile Section */
    .profile,
    .contact {
        padding: 2rem 7% 1.4rem;
    }

    .profile h2,
    .contact h2 {
        text-align: center;
        font-size: 2.3rem;
        font-weight: 500;
        margin-bottom: 3rem;
        color: var(--secondary);
    }

    .profile p {
        margin-top: -2%;
        font-weight: 300;
        text-align: justify;
    }

    .profile .row {
        display: flex;
        padding-top: 1rem;
        margin-top: 2rem;
        background-color: var(--bg2);
    }

    .profile .row .vission,
    .profile .row .mission {
        flex: 50%;
        padding: 10px;
        height: 300px;
    }

    .profile .row .vission p {
        padding: 1.2rem;
        margin-top: -10%;
        font-size: 1.3rem;
        color: var(--secondary);
        font-weight: 300;
    }

    .profile .row ol {
        padding: 1.2rem;
        margin-top: -10%;
        text-align: justify;
        color: var(--secondary);
        font-weight: 300;
    }

    /* Contact Section */
    .contact .row {
        display: flex;
        margin-top: 2rem;
        background-color: #fff;
        box-shadow: 1px 1px 3px rgba(1, 1, 3, 0.5);
        border-radius: 0.7rem;
    }

    .contact .row .map {
        flex: 1 1 35rem;
        width: 60%;
        object-fit: cover;
        height: calc(100%-3rem);
    }

    .contact .row form {
        flex: 1 1 30rem;
        padding: 1rem;
        text-align: left;
        margin-left: 6rem;
    }

    .contact .row form .input-group {
        display: flex;
        align-items: center;
        margin-top: 1rem;
        border: 1px solid var(--primary);
        width: 80%;
    }

    .contact .row form .input-group input {
        width: 50%;
        padding: 1rem;
        border-radius: 0;
        font-size: 1rem;
        background: none;
        color: #000000;
    }

    textarea::placeholder {
        font-family: "Poppins", sans-serif;
        font-size: 1rem;
        padding-left: 1rem;
    }

    .contact .row form .btn {
        margin-top: 1rem;
        display: inline-block;
        padding: 1rem 10.1rem;
        font-size: 1rem;
        color: #fff;
        background-color: var(--primary);
        cursor: pointer;
        border-radius: 0.5rem;
    }

    /* Queue Section */
    .day {
        display: flex;
        padding: 1rem 7%;
        justify-content: center;
    }

    .schedule {
        flex-basis: 6rem;
        text-align: center;
        padding: 0.6rem;
        cursor: pointer;
        transition: background-color 0.3s ease;
        background-color: var(--primary);
        color: #fff;
    }

    .schedule:hover {
        background-color: #0049b8;
    }

    .schedule:first-child {
        border-top-left-radius: 0.6rem;
        border-bottom-left-radius: 0.6rem;
    }

    .schedule:last-child {
        border-top-right-radius: 0.6rem;
        border-bottom-right-radius: 0.6rem;
    }

    #antrian-pasien {
        border-collapse: collapse;
        font-weight: 300;
        width: 70%;
        margin: 0 auto;
    }

    #antrian-pasien th,
    #antrian-pasien td {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #antrian-pasien th {
        padding-top: 0.7rem;
        padding-bottom: 0.7rem;
        text-align: center;
        background-color: var(--primary);
        color: #fff;
    }

    /* Visit Schedule Section */
    .jadwal,
    .register1,
    .poli {
        padding: 1rem 7%;
        margin-top: 8%;
    }

    .jadwal h3,
    .register1 h3,
    .poli .title h3 {
        position: absolute;
        font-weight: 600;
        font-size: 1rem;
        letter-spacing: 0;
        text-decoration: underline;
    }

    .jadwal .container {
        display: flex;
        align-items: center;
        justify-content: space-between;
        width: 28rem;
        padding: 0.6rem;
        margin-top: 3rem;
        border: 1px solid #0049b8;
        border-radius: 0.3rem;
        box-shadow: 1px 1px 3px rgba(1, 1, 3, 0.5);
    }

    .jadwal .container .circle {
        width: 2.2rem;
        height: 2.2rem;
        background-color: var(--bg2);
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .jadwal .container p {
        flex: 1;
        padding: 3px 10px;
        font-weight: 600;
    }

    .jadwal .container .time-box {
        width: 150px;
        height: 35px;
        display: flex;
        justify-content: center;
        background-color: var(--primary);
        color: #fff;
        padding: 0.3rem 0.5rem;
        border-radius: 0.3rem;
    }

    .jadwal .date-container {
        display: flex;
        flex-wrap: wrap;
        padding-top: 10px;
    }

    .jadwal .date-container .date-box {
        width: 180px;
        height: 130px;
        border: 2px;
        margin: 15px;
        display: inline-block;
        border-radius: 10px;
        padding-left: 2px;
        cursor: pointer;
    }

    .jadwal .date-container .date-box:hover {
        border: 1px solid var(--primary);
    }

    .jadwal .date-container .date-box .date {
        font-size: 50px;
        font-weight: 600;
        text-align: center;
    }

    .jadwal .date-container .date-box .month {
        text-align: center;
    }

    .red {
        background-color: red;
    }

    .jadwal .hour {
        display: flex;
        flex-direction: column;
        width: 100;
        height: 100px;
        box-shadow: 1px 1px 3px rgba(1, 1, 3, 0.5);
        border-radius: 1rem;
        margin-top: 10px;
    }

    .jadwal .part {
        flex: 1;
        display: flex;
        flex-direction: row;
        justify-content: flex-start;
        align-items: center;
        padding-left: 10px;
    }

    .jadwal .part p {
        color: #0077b6;
        font-weight: 600;
    }

    .jadwal .part .hour-option {
        width: 100%;
        display: flex;
        justify-content: flex-start;
        align-items: center;
    }

    .jadwal .part .hour-option .hour1 {
        width: 100px;
        height: 30px;
        border: 1px solid var(--line);
        border-radius: 8px;
        margin-right: 8px;
        display: flex;
        justify-content: center;
        align-items: center;
        font-weight: 400;
        cursor: pointer;
    }

    .jadwal .part .hour-option .hour1:hover {
        border: 1px solid var(--primary);
    }

    .jadwal .button-container,
    .register1 .button-container,
    .poli .button-container {
        display: flex;
        justify-content: space-between;
        margin: 20px;
        padding: 10px;
    }

    #button-back {
        background-color: #f08080;
    }

    #button-next {
        background-color: var(--primary);
    }

    .jadwal .button-container button,
    .register1 .button-container button,
    .poli .button-container button {
        color: #fff;
        border: none;
        padding: 10px 30px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        cursor: pointer;
        border-radius: 5px;
        font-size: 1.1rem;
        font-weight: 500;
    }

    /* Register */
    .register1 table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 2rem;
    }

    .register1 th,
    .register1 td {
        padding-top: 1.3rem;
        text-align: left;
    }

    .register1 .option-container {
        display: flex;
        align-items: center;
        justify-content: flex-start;
        gap: 10px;
    }

    input[type="text"] {
        width: 30.5rem;
        padding: 10px;
        box-sizing: border-box;
        border: 1px solid var(--line);
        border-radius: 5px;
    }

    input[type="date"] {
        width: 30.5rem;
        padding: 10px;
        box-sizing: border-box;
        border: 1px solid var(--line);
        border-radius: 5px;
    }

    .register1 .option-container button {
        width: 15rem;
        border: none;
        padding: 10px 30px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        cursor: pointer;
        border-radius: 5px;
        background-color: var(--bg2);
        font-family: "Poppins", sans-serif;
        font-size: 15px;
    }

    .register1 .option-container button:hover {
        background-color: #bbdefb;
    }

    .register1 .option-container button:active {
        background-color: var(--primary);
        color: #fff;
    }

    /* Poli */
    .poli .poli-option .poli-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 3rem;
        margin-top: 5%;
    }

    .poli .poli-option .poli-content {
        text-align: center;
        margin-top: 1rem;
        font-weight: 300;
    }

    /* Login Queries */
    #login-card {
        background: #fff;
        border-radius: 8px;
        box-shadow: 1px 2px 8px rgba(0, 0, 0, 0.65);
        height: 415px;
        width: 330px;
        margin: 8rem auto 8.1rem auto;
    }

    .login .login-content {
        padding: 12px 44px;
    }

    .login .login-content .logo1 {
        text-align: center;
    }

    .login .login-content img {
        display: inline-block;
        margin: 0 auto;
        width: 200px;
        height: auto;
    }

    .login .card-title {
        letter-spacing: 4px;
        padding-bottom: 23px;
        padding-top: 13px;
        text-align: center;
    }

    .login a {
        text-decoration: none;
    }

    #forgot-pass {
        color: #0d47a1;
        margin-top: 3px;
        text-align: right;
    }

    .login .form {
        align-items: left;
        display: flex;
        flex-direction: column;
    }

    .login .form-border {
        height: 1px;
        width: 100%;
        background: var(--primary);
    }

    .login .form-content {
        border: none;
        outline: none;
        padding-top: 14px;
    }

    #submit-btn {
        background: var(--primary);
        border: none;
        border-radius: 21px;
        box-shadow: 0px 1px 8px #131420;
        cursor: pointer;
        color: #fff;
        height: 42px;
        margin: 0 auto;
        margin-top: 50px;
        transition: 0.25s;
        width: 153px;
    }

    #submit-btn:hover {
        box-shadow: 0px 1px 18px #131420;
    }

    /* Media Queries*/
    /*Laptop*/
    @media (max-width: 1366px) {
        html {
            font-size: 90%;
        }
    }

    /*Tablet*/
    @media (max-width: 768px) {
        html {
            font-size: 62.5%;
        }

        #menu {
            display: inline-block;
        }

        .navbar .navbar-nav {
            position: absolute;
            top: 100%;
            right: -100%;
            background-color: #fff;
            border-left: 0.5px solid var(--line);
            width: 15rem;
            height: 100vh;
            transition: 0.3s;
        }

        .navbar .navbar-nav.active {
            right: 0;
        }

        .navbar .navbar-nav a {
            display: block;
            margin: 1.5rem;
            padding: 0.5rem;
            font-size: 1.3rem;
        }

        .navbar .navbar-nav a:hover {
            color: var(--primary);
        }

        .contact .row {
            flex-wrap: wrap;
        }

        .contact .row .map {
            height: 30rem;
        }

        .contact .row form {
            padding-top: 0;
        }
    }

    /*Mobile Phone*/
    @media (max-width: 450px) {
        html {
            font-size: 55%;
        }
    }
    </style>
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-white">
        @include('components.landing-navbar')

        <main>
            {{ $slot }}
        </main>

        <footer>
            @include('components.landing-footer')
        </footer>
    </div>
    @include('sweetalert::alert')
</body>

</html>