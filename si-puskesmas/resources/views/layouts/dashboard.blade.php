<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="{{ asset('vendor/bladewind/css/animate.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('vendor/bladewind/css/bladewind-ui.min.css') }}" rel="stylesheet" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    

    <style>
        :root {
            --primary: #0166ff;
            --bg: #fefffe;
            --line: #b6c5ce;
            --bg2: #e3f2fd;
            --bg3: #fff;
            --secondary: #001233;
            --line2: #94aab8;
            --font: #506877;
        }


        body {
            font-family: "Poppins", sans-serif;
            background-color: #f3f5f7;
            color: #131420;
        }

        /* Top Bar/Header */
        .top-bar {
            background-color: var(--bg3);
            color: var(--primary);
            padding: 30px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            z-index: -1;
            height: 5rem;
            width: 100%;
            position: fixed;
            float: right;
        }

        .profil-info {
            display: flex;
            align-items: center;
            margin-left: auto;
            margin-right: 3%;
        }

        .profile-picture {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            overflow: hidden;
            margin-right: 10px;
            background-color: var(--line);
            justify-content: center;
            display: flex;
        }

        .photo {
            width: 70%;
            height: 70%;
            object-fit: cover;
        }

        .user-level {
            margin-left: 10px;
        }

        /* Sidebar */
        .sidebar {
            width: 250px;
            height: 100vh;
            background-color: var(--bg3);
            color: var(--secondary);
            padding: 20px;
            border: 1px solid var(--line);
            box-shadow: 0px 0px 5px #131420;
            position: absolute;
            top: 0;
            left: 0;
        }

        .sidebar .sidebar-header {
            text-align: center;
            margin-bottom: 20px;
            font-size: 13px;
            font-weight: 400;
        }

        .sidebar .sidebar-header img {
            width: 120px;
            height: auto;
        }

        .menu {
            list-style-type: none;
            padding: 0;
        }

        .menu li {
            margin-bottom: 13px;
        }

        .menu a {
            color: var(--font);
            text-decoration: none;
            display: flex;
            align-items: center;
        }

        .menu a i {
            margin-right: 10px;
            color: var(--line2);
        }

        .submenu {
            list-style-type: none;
            padding-left: 20px;
            padding-top: 13px;
        }

        .menu li a:hover,
        .submenu li a:hover {
            background-color: var(--line);
        }

        /* Dashboard */
        .db-content {
            padding: 20px;
        }

        .db-content h1 {
            font-size: 24px;
            color: #0166ff;
        }

        .db-content .db-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 2rem;
        }

        .db-content .box-grid {
            display: flex;
            width: 20rem;
            height: 8rem;
            background-color: var(--bg3);
            justify-content: center;
            box-shadow: 1px 1px 3px rgba(1, 1, 3, 0.5);
            border-radius: 0.5rem;
            padding-top: 0.5rem;
            margin-top: 2rem;
        }

        .db-content .box-content h4 {
            font-weight: 400;
        }
    </style>
    <script src="{{ asset('vendor/bladewind/js/helpers.js') }}"></script>
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-white">
        
        <aside class="fixed z-50">
            <x-dashboard-sidebar />
        </aside>
        <header class="shadow top-0 sticky relative z-10 bg-[#efe1ce]">
            <x-dashboard-navbar />
        </header>
        <main class="ml-[16rem]">
            <div class="m-2 rounded shadow p-8">
                {{ $slot }}
            </div>
        </main>

    </div>
    @include('sweetalert::alert')
</body>

</html>