<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Dashboard') | Admin Rumah Belajar</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f5f7fb;
            background-image: url('{{ asset('bg-repeat.png') }}');
            background-repeat: repeat;
            overflow-x: hidden;
            font-size: 0.8rem;
        }

        /* Paksa ukuran font input, select, dan tombol agar seragam 0.8rem */
        .form-control, .form-select, .btn, input, select, textarea {
            font-size: 0.8rem !important;
        }

        #wrapper {
            display: flex;
            width: 100%;
            min-height: 100vh;
        }

        /* Sidebar Styling */
        #sidebar-wrapper {
            min-height: 100vh;
            width: 250px;
            margin-left: 0;
            transition: margin 0.25s ease-out;
            background-color: #ffffff;
            border-right: 1px solid #e0e0e0;
        }

        #sidebar-wrapper .sidebar-heading {
            padding: 1.5rem 1.25rem;
            font-size: 1.2rem;
            font-weight: bold;
            color: #FFD700;
            /* Warna Emas Branding */
            text-align: center;
        }

        #sidebar-wrapper .list-group {
            width: 250px;
        }

        .list-group-item {
            border: none;
            padding: 1rem 1.5rem;
            font-weight: 500;
            color: #555;
        }

        .list-group-item:hover {
            background-color: #f8f9fa;
            color: #FFD700;
        }

        .list-group-item.active {
            background-color: #fff8e1;
            color: #FFD700;
            border-left: 4px solid #FFD700;
        }

        /* Page Content */
        #page-content-wrapper {
            flex: 1;
            width: 100%;
        }

        .navbar {
            box-shadow: 0 2px 4px rgba(0, 0, 0, .04);
        }

        /* Toggled State */
        body.sb-sidenav-toggled #sidebar-wrapper {
            margin-left: -250px;
        }
    </style>

    <!-- Custom Styles per Page -->
    @yield('style')
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <div class="sidebar-heading">Rumah Belajar 🚀</div>
            <div class="list-group list-group-flush mt-3">
                <a href="#" class="list-group-item list-group-item-action active">
                    <i class="bi bi-speedometer2 me-2"></i> Dashboard
                </a>
                <a href="{{ route('materi.index') }}" class="list-group-item list-group-item-action">
                    <i class="bi bi-book me-2"></i> Materi
                </a>
                <a href="#" class="list-group-item list-group-item-action">
                    <i class="bi bi-people me-2"></i> Pengguna
                </a>
                <a href="#" class="list-group-item list-group-item-action">
                    <i class="bi bi-gear me-2"></i> Pengaturan
                </a>
                <a href="{{ route('landingPage') }}" target="_blank" class="list-group-item list-group-item-action">
                    <i class="bi bi-globe me-2"></i> Lihat Website
                </a>
            </div>
        </div>

        <!-- Page Content Wrapper -->
        <div id="page-content-wrapper">
            <!-- Top Navigation -->
            <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom px-4 py-3">
                <button class="btn btn-light" id="sidebarToggle"><i class="bi bi-list"></i></button>

                <div class="ms-auto">
                    <span class="fw-bold text-secondary">Halo, Admin!</span>
                </div>
            </nav>

            <!-- Main Content -->
            <div class="container-fluid px-4 py-4">
                @yield('content')
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom Scripts per Page -->
    @yield('script')

    <script>
        // Toggle Sidebar Script
        window.addEventListener('DOMContentLoaded', event => {
            const sidebarToggle = document.body.querySelector('#sidebarToggle');
            if (sidebarToggle) {
                sidebarToggle.addEventListener('click', event => {
                    event.preventDefault();
                    document.body.classList.toggle('sb-sidenav-toggled');
                });
            }
        });
    </script>
</body>

</html>
