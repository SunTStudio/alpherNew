<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dunia Belajar Ceria</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- AOS Animation -->
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <style>
        body {
            color: #333;
            font-family: 'Fredoka', sans-serif;
            /* Font bulat lucu untuk anak */
            background-color: #f8f9fa;
            overflow-x: hidden;
        }

        /* Navbar */
        .nav-link {
            color: #555 !important;
        }

        .nav-link:hover {
            color: #000 !important;
        }

        /* Hero */
        .hero-title {
            font-family: 'Fredoka', sans-serif;
            font-size: 4rem;
            font-weight: 700;
            line-height: 1.1;
            text-shadow: 3px 3px 0px rgba(0, 0, 0, 0.2);
        }

        .free-badge {
            background: #FFD700;
            color: #333;
            padding: 5px 15px;
            border-radius: 50px;
            font-weight: 600;
            font-size: 1rem;
            display: inline-block;
            box-shadow: 0 5px 15px rgba(255, 215, 0, 0.4);
        }

        /* Card Character */
        .char-card {
            background: #ffffff;
            color: #333;
            border-radius: 35px;
            padding: 20px;
            padding-top: 140px;
            min-height: 350px;
            margin-top: 80px;
            transition: all 0.5s cubic-bezier(0.68, -0.55, 0.265, 1.55);
            position: relative;
            overflow: visible;
            border: 5px solid #fff;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            cursor: pointer;
        }

        /* Pyramid Effect */
        .swiper-slide .char-card {
            transform: scale(0.8);
            opacity: 0.5;
            filter: blur(2px);
            transition: all 0.5s ease;
        }

        .swiper-slide-active .char-card {
            transform: scale(1.1);
            opacity: 1;
            filter: blur(0);
            z-index: 10;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.15);
            background: #fff;
        }

        .swiper-slide-active .char-card:hover {
            transform: scale(1.15) translateY(-15px);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.2);
        }

        .char-img {
            width: 100%;
            object-fit: contain;
            position: absolute;
            top: 0;
            left: 50%;
            transform: translateX(-50%) translateY(20px) scale(0.9);
            transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
            filter: drop-shadow(0 5px 5px rgba(0, 0, 0, 0.2));
            opacity: 1;
        }

        @keyframes wiggle {

            0%,
            100% {
                transform: translateX(-50%) translateY(-30px) scale(1) rotate(0deg);
            }

            25% {
                transform: translateX(-50%) translateY(-30px) scale(1) rotate(-5deg);
            }

            75% {
                transform: translateX(-50%) translateY(-30px) scale(1) rotate(5deg);
            }
        }

        .swiper-slide-active .char-card:hover .char-img {
            transform: translateX(-50%) translateY(-30px) scale(1);
            filter: drop-shadow(0 20px 20px rgba(0, 0, 0, 0.3));
            opacity: 1;
            animation: wiggle 1s infinite ease-in-out 0.4s;
        }

        .rating-icon {
            margin-right: 4px;
        }

        /* Video Glow */
        .video-frame {
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0px 0px 25px rgba(255, 0, 255, 0.4);
            animation: glowPulse 3s infinite alternate;
        }

        @keyframes glowPulse {
            0% {
                box-shadow: 0 0 20px rgba(255, 0, 255, 0.3);
            }

            100% {
                box-shadow: 0 0 40px rgba(0, 200, 255, 0.4);
            }
        }

        /* Swiper Customization */
        .swiper {
            width: 100%;
            padding-top: 20px;
            padding-bottom: 50px;
        }

        .swiper-pagination-bullet {
            background: #fff;
        }

        #bg-pattern {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('{{ asset('bg-repeat.png') }}');
            background-repeat: repeat;
            z-index: -1;
        }

        /* Modal Customization */
        .modal-content {
            border-radius: 25px;
            border: none;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            overflow: hidden;
        }

        .modal-header {
            background-color: #FFD700;
            color: #333;
            border-bottom: none;
            padding: 20px 30px;
        }

        .modal-title {
            font-weight: 700;
            font-family: 'Fredoka', sans-serif;
        }

        .modal-body {
            padding: 30px;
            background-color: #fff;
        }

        .sub-materi-item {
            background: #f8f9fa;
            border-radius: 15px;
            padding: 15px 20px;
            margin-bottom: 10px;
            transition: all 0.3s ease;
            cursor: pointer;
            border: 2px solid transparent;
            display: flex;
            align-items: center;
            font-weight: 500;
        }

        .sub-materi-item:hover {
            background: #fff;
            border-color: #FFD700;
            transform: translateX(10px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        .sub-materi-img {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            object-fit: cover;
            margin-right: 15px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        /* Modal Animation */
        .modal.fade .modal-dialog {
            transform: scale(0.8);
            opacity: 0;
            transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
        }

        .modal.show .modal-dialog {
            transform: scale(1);
            opacity: 1;
        }

        /* Loading Screen */
        #loader-wrapper {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: #ffffff;
            z-index: 9999;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            transition: opacity 0.5s ease-out, visibility 0.5s ease-out;
        }

        .loader-content {
            text-align: center;
        }

        .bouncing-balls {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        .ball {
            width: 25px;
            height: 25px;
            border-radius: 50%;
            margin: 0 8px;
            animation: bounce 0.6s infinite alternate;
        }

        .ball:nth-child(1) {
            background-color: #FF6B6B;
            animation-delay: 0s;
        }

        .ball:nth-child(2) {
            background-color: #FFD700;
            animation-delay: 0.2s;
        }

        .ball:nth-child(3) {
            background-color: #4ECDC4;
            animation-delay: 0.4s;
        }

        .ball:nth-child(4) {
            background-color: #A29BFE;
            animation-delay: 0.6s;
        }

        @keyframes bounce {
            from {
                transform: translateY(0);
            }

            to {
                transform: translateY(-30px);
            }
        }

        .loading-text {
            font-family: 'Fredoka', sans-serif;
            font-size: 1.5rem;
            font-weight: 700;
            color: #555;
            margin-top: 15px;
            animation: pulse 1s infinite;
        }

        .loader-hidden {
            opacity: 0;
            visibility: hidden;
        }

        /* --- Animasi Tambahan untuk Anak TK --- */
        /* 1. Floating Animation (Mengapung) */
        @keyframes floaty {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        .float-anim {
            animation: floaty 3s ease-in-out infinite;
        }

        /* 2. Rainbow Text (Warna Warni) */
        @keyframes rainbow-text {
            0% {
                color: #FFD700;
            }

            25% {
                color: #FF6B6B;
            }

            50% {
                color: #4ECDC4;
            }

            75% {
                color: #A29BFE;
            }

            100% {
                color: #FFD700;
            }
        }

        .rainbow-text {
            animation: rainbow-text 4s linear infinite;
        }

        /* 3. Magic Dust Cursor (Jejak Mouse) */
        .magic-dust {
            position: fixed;
            pointer-events: none;
            width: 15px;
            height: 15px;
            border-radius: 50%;
            z-index: 9999;
            animation: fadeOutDust 0.8s forwards;
        }

        @keyframes fadeOutDust {
            0% {
                opacity: 1;
                transform: scale(1);
            }

            100% {
                opacity: 0;
                transform: scale(2.5);
            }
        }

        /* 4. Button Pulse (Tombol Berdenyut) */
        .btn-pulse {
            animation: pulse-btn 2s infinite;
        }

        @keyframes pulse-btn {
            0% {
                transform: scale(1);
                box-shadow: 0 0 0 0 rgba(255, 215, 0, 0.7);
            }

            70% {
                transform: scale(1.05);
                box-shadow: 0 0 0 10px rgba(255, 215, 0, 0);
            }

            100% {
                transform: scale(1);
                box-shadow: 0 0 0 0 rgba(255, 215, 0, 0);
            }
        }
    </style>
</head>

<body>
    <!-- Loading Screen -->
    <div id="loader-wrapper">
        <div class="loader-content">
            <div class="bouncing-balls">
                <div class="ball"></div>
                <div class="ball"></div>
                <div class="ball"></div>
                <div class="ball"></div>
            </div>
            <div class="loading-text">Sedang Memuat... 🚀</div>
        </div>
    </div>

    <div id="bg-pattern"></div>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light px-4 py-3">
        <a class="navbar-brand fw-bold" href="#">
            <img src="https://placehold.co/40x40/FFD700/ffffff?text=ABC&font=fredoka" width="40" alt="Logo"
                class="rounded-circle">
            Rumah Belajar
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div id="nav" class="collapse navbar-collapse">
            <ul class="navbar-nav ms-4">
                <li class="nav-item"><a class="nav-link" href="#">Materi</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Permainan</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Lagu Anak</a></li>
            </ul>

            <div class="ms-auto d-flex align-items-center">
                @auth
                    {{-- tombol ke cms dashboard--}}
                    {{-- @if(Auth::user()->role == 'admin') --}}
                        <a href="{{ route('cms.dashboard') }}" class="btn btn-warning rounded-pill px-4 fw-bold me-3 shadow-sm">
                            <i class="bi bi-speedometer2 me-1"></i> Dashboard Admin
                        </a>
                    {{-- @endif --}}
                    

                    <div class="dropdown">
                        <a class="d-flex align-items-center text-decoration-none dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="text-end me-2 d-none d-sm-block">
                                <div class="fw-bold text-dark small">{{ Auth::user()->nama_lengkap }}</div>
                                <div class="text-secondary" style="font-size: 0.75rem;">{{ Auth::user()->nama_sekolah ?? 'Siswa Pintar' }}</div>
                            </div>
                            <img src="https://api.dicebear.com/7.x/fun-emoji/svg?seed={{ Auth::user()->username }}" class="rounded-circle border border-2 border-white shadow-sm bg-white" width="45" height="45" alt="Avatar">
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end border-0 shadow-lg rounded-4 mt-2 overflow-hidden">
                            <li><a class="dropdown-item py-2" href="#">👤 Profil Saya</a></li>
                            <li><a class="dropdown-item py-2" href="#">🏆 Prestasi</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item py-2 text-danger fw-bold" href="#" onclick="confirmLogout()">🚪 Keluar</a></li>
                        </ul>
                    </div>
                    
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @else
                    <a href="{{ route('login') }}" class="btn btn-outline-primary rounded-pill px-4 fw-bold me-2">Masuk</a>
                    <a href="{{ route('register') }}" class="btn btn-primary rounded-pill px-4 fw-bold text-white">Daftar</a>
                @endauth
            </div>
        </div>
    </nav>

    <!-- Hero -->
    <section class="container text-center mt-5">
        <div class="free-badge float-anim" data-aos="fade-down">✨ Belajar Jadi Menyenangkan! ✨</div>

        <h1 class="hero-title mt-3" data-aos="fade-up">Dunia <span class="rainbow-text">Pintar</span><br>Anak Ceria
        </h1>

        <p class="mt-3 text-secondary" data-aos="fade-up" data-aos-delay="150">
            Temukan cara seru belajar huruf, angka, dan warna<br>
            bersama teman-teman baru!
        </p>
    </section>

    <!-- Character Cards -->
    <section class="container ">
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                @php
                    $colors = ['#FF6B6B', '#4ECDC4', '#FFE66D', '#FF9F43', '#A29BFE', '#FF9FF3'];
                    $badges = ['bg-warning', 'bg-info', 'bg-success', 'bg-danger', 'bg-primary', 'bg-secondary'];
                    $icons = ['📚', '🔢', '🐾', '🎨', '🎤', '🚀'];
                @endphp

                @forelse($materi as $item)
                    @php
                        $color = $colors[$loop->index % count($colors)];
                        $badge = $badges[$loop->index % count($badges)];
                        $icon = $icons[$loop->index % count($icons)];
                        // Pastikan relasi subMateris diload di controller, atau gunakan subMateri jika nama relasinya singular
                        $subMateriData = $item->subMateris ?? $item->subMateri ?? []; 
                    @endphp
                    <div class="swiper-slide">
                        <div class="char-card text-center mx-3" 
                             style="border-bottom: 5px solid {{ $color }};"
                             data-title="{{ $item->judul }}"
                             data-color="{{ $color }}"
                             data-sub-materi="{{ json_encode($subMateriData) }}">
                            
                            <img class="char-img" 
                                 src="{{ $item->gambar ? asset($item->gambar) : 'https://placehold.co/200x200/'.str_replace('#','',$color).'/ffffff/png?text='.substr($item->judul,0,1).'&font=fredoka' }}"
                                 alt="{{ $item->judul }}">
                            
                            <h4 class="mt-5 fw-bold">{{ $item->judul }}</h4>
                            <p class="text-secondary small">{{ $item->kategori ?? 'Umum' }}</p>
                            
                            <div class="d-flex align-items-center justify-content-center btn-pulse badge {{ $badge }} text-white rounded-pill px-3 py-2 mt-2">
                                <span class="rating-icon">{{ $icon }}</span>
                                Mulai
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <p class="text-muted">Belum ada materi yang tersedia saat ini.</p>
                    </div>
                @endforelse

            </div>
            <div class="swiper-pagination"></div>
        </div>
    </section>

    <!-- Modal Sub Materi -->
    <div class="modal fade" id="materiModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitle">Judul Materi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="modalList" class="d-flex flex-column">
                        <!-- List items will be injected here -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="text-center mt-5 py-4 text-secondary">
        © 2026 Rumah Belajar Ceria - Pendidikan Anak Usia Dini
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script>
        AOS.init({
            duration: 800,
            once: true
        });

        // Magic Dust Cursor Effect (Jejak Mouse)
        document.addEventListener('mousemove', function(e) {
            if (Math.random() > 0.2) return; // Muncul sesekali agar tidak berat
            const dust = document.createElement('div');
            dust.classList.add('magic-dust');
            dust.style.left = e.clientX + 'px';
            dust.style.top = e.clientY + 'px';

            const colors = ['#FF6B6B', '#FFD700', '#4ECDC4', '#A29BFE'];
            dust.style.background = colors[Math.floor(Math.random() * colors.length)];

            document.body.appendChild(dust);
            setTimeout(() => dust.remove(), 800);
        });

        // Loading Screen Logic
        window.addEventListener('load', function() {
            const loader = document.getElementById('loader-wrapper');
            setTimeout(() => {
                loader.classList.add('loader-hidden');
                setTimeout(() => {
                    loader.style.display = 'none';
                }, 500);
            }, 1000); // Delay 1 detik agar animasi terlihat
        });

        // Initialize Swiper
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 1,
            spaceBetween: 10,
            centeredSlides: true,
            loop: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            breakpoints: {
                640: {
                    slidesPerView: 1.5,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 2.5,
                    spaceBetween: 30,
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 40,
                },
            },
        });

        // Hover Effect: PNG to GIF
        document.querySelectorAll('.char-card').forEach(card => {
            const img = card.querySelector('.char-img');
            const staticSrc = img.src;
            const gifSrc = img.getAttribute('data-gif');

            card.addEventListener('mouseenter', () => {
                if (gifSrc) img.src = gifSrc;
            });
            card.addEventListener('mouseleave', () => {
                img.src = staticSrc;
            });
        });

        // Modal Logic
        const materiModal = new bootstrap.Modal(document.getElementById('materiModal'));
        const modalTitle = document.getElementById('modalTitle');
        const modalList = document.getElementById('modalList');
        const modalHeader = document.querySelector('.modal-header');

        document.querySelectorAll('.char-card').forEach(card => {
            card.addEventListener('click', function() {
                const title = this.getAttribute('data-title');
                const color = this.getAttribute('data-color');
                const subMateriJson = this.getAttribute('data-sub-materi');
                let data = [];

                try {
                    data = JSON.parse(subMateriJson);
                } catch (e) {
                    console.error("Error parsing sub-materi data", e);
                }

                if (data && data.length > 0) {
                    modalTitle.innerText = title;
                    modalList.innerHTML = '';

                    // Set header color based on card border color
                    modalHeader.style.backgroundColor = color;
                    modalHeader.style.color = '#fff';

                    data.forEach((item, index) => {
                        // Tentukan gambar: gunakan gambar dari DB atau placeholder
                        const imgSrc = item.gambar ? '{{ asset('') }}' + item.gambar : 'https://placehold.co/100x100/eee/999?text=IMG&font=fredoka';
                        
                        const div = document.createElement('div');
                        div.className = 'sub-materi-item';
                        div.style.opacity = '0';
                        div.style.transform = 'translateY(20px)';
                        
                        // Jika ada link, buat item bisa diklik untuk membuka link
                        if(item.link) {
                            div.onclick = function() { window.open(item.link, '_blank'); };
                        }

                        div.innerHTML = `
                            <img src="${imgSrc}" class="sub-materi-img" alt="${item.judul}">
                            <div class="d-flex flex-column">
                                <span>${item.judul}</span>
                                ${item.harga > 0 ? '<small class="text-success fw-bold">Rp ' + new Intl.NumberFormat('id-ID').format(item.harga) + '</small>' : '<small class="text-muted">Gratis</small>'}
                            </div>
                        `;
                        modalList.appendChild(div);

                        // Staggered animation for list items
                        setTimeout(() => {
                            div.style.transition = 'all 0.4s ease';
                            div.style.opacity = '1';
                            div.style.transform = 'translateY(0)';
                        }, 100 + (index * 100));
                    });

                    materiModal.show();
                } else {
                    // Jika tidak ada sub materi
                    Swal.fire({
                        icon: 'info',
                        title: 'Belum Ada Isi',
                        text: 'Materi ini belum memiliki konten. Cek lagi nanti ya! 😊',
                        confirmButtonColor: color
                    });
                }
            });
        });
    </script>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if($message = Session::get('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Hore!',
            text: '{{ $message }}',
            confirmButtonColor: '#4ECDC4',
            confirmButtonText: 'Lanjut Belajar 🚀'
        });
    </script>
    @endif

    @if($message = Session::get('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Ups...',
            text: '{{ $message }}',
            confirmButtonColor: '#FF6B6B',
            confirmButtonText: 'Coba Lagi 😅'
        });
    </script>
    @endif

    <script>
        function confirmLogout() {
            Swal.fire({
                title: 'Mau udahan?',
                text: "Nanti main lagi ya! 😢",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#FF6B6B',
                cancelButtonColor: '#4ECDC4',
                confirmButtonText: 'Iya, Keluar',
                cancelButtonText: 'Gak Jadi'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('logout-form').submit();
                }
            })
        }
    </script>
</body>

</html>
