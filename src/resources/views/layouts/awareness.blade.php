<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <meta
        name="description"
        content="Program edukasi keamanan informasi dan simulasi phishing untuk mahasiswa."
    >

    <title>
        @yield('title', 'Security Awareness Program')
    </title>

    <link
        rel="stylesheet"
        href="{{ asset('css/awareness.css') }}"
    >

    @livewireStyles
</head>

<body>
    <header class="site-header">
        <div class="container header-wrapper">
            <a
                href="{{ route('awareness.home') }}"
                class="brand"
            >
                <span class="brand-icon">
                    S
                </span>

                <span>
                    Security Awareness

                    <small>
                        Program Edukasi Mahasiswa
                    </small>
                </span>
            </a>

            <nav class="navigation">
                <a href="{{ route('awareness.home') }}">
                    Beranda
                </a>

                <a href="{{ route('awareness.simulation') }}">
                    Simulasi
                </a>

                <a href="{{ route('awareness.education') }}">
                    Edukasi
                </a>
            </nav>
        </div>
    </header>

    <div class="simulation-banner">
        Simulasi edukasi keamanan informasi — jangan gunakan data asli.
    </div>

    <main>
        @yield('content')
    </main>

    <footer class="site-footer">
        <div class="container footer-wrapper">
            <div>
                <strong>
                    Security Awareness Program
                </strong>

                <p>
                    Proyek edukasi untuk meningkatkan kesadaran
                    terhadap ancaman phishing.
                </p>
            </div>

            <p>
                Email dummy dan hasil simulasi disimpan untuk evaluasi.
                Password asli dan OTP tidak pernah disimpan.
            </p>
        </div>
    </footer>

    @livewireScripts

    @stack('scripts')
</body>
</html>