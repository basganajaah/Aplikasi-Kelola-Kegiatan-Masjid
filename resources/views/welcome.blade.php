<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Aplikasi Kelola Kegiatan Masjid</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@200;400;600;800&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            body {
                margin: 0;
                font-family: "Plus Jakarta Sans", sans-serif;
                background-image: url('{{ asset('Images/Masjid_LH_polban.jpg') }}');
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
                color: #ffffff;
            }
            .overlay {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 0, 0.5);
            }
            .container {
                position: relative;
                z-index: 2;
                min-height: 100vh;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                padding: 20px;
            }
            .navbar {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                background: rgba(0, 0, 0, 0.7);
                display: flex;
                align-items: center;
                padding: 10px 20px;
                z-index: 10;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.5);
            }

            .navbar nav {
                display: flex;
                gap: 10px;
                margin-left: auto; /* Geser tombol ke kiri */
                margin-right: 50px;
            }

            .navbar a {
                padding: 8px 16px;
                border: 2px solid #ffffff;
                border-radius: 5px;
                text-decoration: none;
                color: #ffffff;
                font-weight: 600;
                transition: background-color 0.3s, color 0.3s;
            }

            .navbar a:hover {
                background-color: #ffffff;
                color: #000000;
            }
            h1 {
                font-size: 3rem;
                text-align: center;
                margin-top: 80px; /* Beri jarak dari navbar */
                line-height: 1.5;
                text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5);
            }
            footer {
                margin-top: 40px;
                text-align: center;
                color: #cccccc;
                font-size: 0.9rem;
            }
            @media (max-width: 768px) {
                .navbar img {
                    width: 40px;
                }
                .navbar a {
                    padding: 10px 20px;
                    font-size: 0.9rem;
                }
                h1 {
                    font-size: 2rem;
                }
            }
        </style>
    </head>
    <body>
        <div class="overlay"></div>
        <div class="container">
            <!-- Navbar -->
            <div class="navbar">
                <nav>
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('admin/dashboard') }}">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}">Masuk</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}">Daftar</a>
                            @endif
                        @endauth
                    @endif
                </nav>
            </div>

            <!-- Main Content -->
            <main>
                <h1>Selamat Datang di Aplikasi Kelola Kegiatan Masjid</h1>
            </main>

            <!-- Footer -->
            <footer>
                © {{ date('Y') }} Aplikasi Masjid | All Rights Reserved
            </footer>
        </div>
    </body>
</html>
