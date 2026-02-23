<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - Dunia Belajar Ceria</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- AOS Animation -->
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">

    <style>
        body {
            font-family: 'Fredoka', sans-serif;
            background-color: #f8f9fa;
            overflow-x: hidden;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px 0;
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
            opacity: 0.5;
        }

        .login-card {
            background: #ffffff;
            border-radius: 35px;
            padding: 40px;
            width: 100%;
            max-width: 600px; /* Lebih lebar dari login karena form lebih banyak */
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            border: 5px solid #fff;
            position: relative;
            overflow: hidden;
            margin: 0 auto;
        }

        .login-title {
            font-weight: 700;
            color: #333;
            font-size: 2rem;
        }

        .form-control {
            border-radius: 50px;
            padding: 12px 20px;
            border: 2px solid #eee;
            background: #f9f9f9;
            font-family: 'Fredoka', sans-serif;
            transition: all 0.3s;
        }

        .form-control:focus {
            box-shadow: none;
            border-color: #FFD700;
            background: #fff;
        }

        .btn-login {
            background: #FF6B6B; /* Warna beda dikit dari login biar fresh */
            color: white;
            border: none;
            border-radius: 50px;
            padding: 12px;
            font-weight: 600;
            width: 100%;
            font-size: 1.1rem;
            transition: all 0.3s;
            box-shadow: 0 4px 15px rgba(255, 107, 107, 0.3);
        }

        .btn-login:hover {
            background: #ff5252;
            transform: translateY(-2px) scale(1.02);
            box-shadow: 0 6px 20px rgba(255, 107, 107, 0.4);
        }

        /* Dekorasi Bulat */
        .decoration-circle {
            position: absolute;
            border-radius: 50%;
            z-index: 0;
        }

        .circle-1 { width: 150px; height: 150px; background: #4ECDC4; top: -50px; right: -50px; opacity: 0.15; }
        .circle-2 { width: 100px; height: 100px; background: #A29BFE; bottom: -20px; left: -20px; opacity: 0.15; }

        /* Animasi */
        @keyframes floaty {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }
        .float-anim { animation: floaty 3s ease-in-out infinite; }
    </style>
</head>

<body>
    <div id="bg-pattern"></div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-7">
                <!-- Logo Area -->
                {{-- <div class="text-center mb-4 float-anim">
                    <img src="https://placehold.co/80x80/FFD700/ffffff?text=RB&font=fredoka" class="rounded-circle shadow-sm border border-4 border-white" alt="Logo">
                    <h3 class="mt-3 fw-bold text-dark" style="text-shadow: 2px 2px 0px rgba(255,255,255,0.5);">Rumah Belajar</h3>
                </div> --}}

                <!-- Register Card -->
                <div class="login-card" data-aos="fade-up" data-aos-duration="800">
                    <div class="decoration-circle circle-1"></div>
                    <div class="decoration-circle circle-2"></div>

                    <div class="text-center mb-4 position-relative" style="z-index: 1;">
                        <h2 class="login-title">Daftar Akun Baru 🌟</h2>
                        <p class="text-secondary small">Isi data diri untuk mulai belajar!</p>
                    </div>

                    <form action="{{ route('register.proses') }}" method="POST" class="position-relative" style="z-index: 1;">
                        @csrf
                        
                        <div class="mb-3">
                            <label class="form-label fw-bold small text-secondary ms-2">Nama Lengkap</label>
                            <input type="text" name="nama_lengkap" class="form-control" placeholder="Contoh: Budi Santoso" required>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold small text-secondary ms-2">Username</label>
                                <input type="text" name="username" class="form-control" placeholder="budi123" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold small text-secondary ms-2">No. WhatsApp</label>
                                <input type="text" name="nomor_whatsapp" class="form-control" placeholder="0812..." required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold small text-secondary ms-2">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="nama@email.com" required>
                        </div> 

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold small text-secondary ms-2">NPSN</label>
                                <input type="text" name="npsn" class="form-control" placeholder="Nomor NPSN" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold small text-secondary ms-2">Nama Sekolah</label>
                                <input type="text" name="nama_sekolah" class="form-control" placeholder="Nama Sekolah" required>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold small text-secondary ms-2">Kata Sandi</label>
                            <input type="password" name="password" class="form-control" placeholder="********" required>
                        </div>

                        <button type="submit" class="btn-login">
                            ✨ Buat Akun
                        </button>
                    </form>

                    <div class="text-center mt-4 position-relative" style="z-index: 1;">
                        <p class="small text-secondary">
                            Sudah punya akun? <a href="{{ route('login') }}" class="text-decoration-none fw-bold" style="color: #4ECDC4;">Masuk di sini</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>
</html>
