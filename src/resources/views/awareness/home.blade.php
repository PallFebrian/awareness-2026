@extends('layouts.awareness')

@section('title', 'Program Kuota Belajar 50 GB')

@section('content')
    <section class="hero">
        <div class="container hero-grid">
            <div class="hero-content">
                <span class="badge">
                    Program Terbatas 2026
                </span>

                <h1>
                    Dapatkan Kuota Belajar
                    <span>50 GB Gratis</span>
                </h1>

                <p class="hero-description">
                    Program bantuan kuota internet untuk mendukung kegiatan
                    pembelajaran, penelitian, dan penyelesaian tugas mahasiswa.
                </p>

                <div class="hero-benefits">
                    <div class="benefit-item">
                        <span>✓</span>
                        Kuota internet sebesar 50 GB
                    </div>

                    <div class="benefit-item">
                        <span>✓</span>
                        Berlaku untuk mahasiswa aktif
                    </div>

                    <div class="benefit-item">
                        <span>✓</span>
                        Proses verifikasi singkat
                    </div>
                </div>

                <div class="hero-actions">
                    <a
                        href="{{ route('awareness.pre-test') }}"
                        class="button button-primary"
                    >
                        Mulai Program dan Pre-Test
                    </a>

                    <a
                        href="#informasi"
                        class="button button-secondary"
                    >
                        Lihat Informasi
                    </a>
                </div>

                <p class="small-warning">
                    Gunakan data dummy selama mengikuti simulasi.
                </p>
            </div>

            <div class="quota-card">
                <div class="quota-card-header">
                    <span>Kuota Belajar</span>

                    <span class="status">
                        Tersedia
                    </span>
                </div>

                <div class="quota-number">
                    50
                    <small>GB</small>
                </div>

                <p>
                    Bantuan kuota untuk mahasiswa aktif.
                </p>

                <div class="quota-progress">
                    <div class="progress-bar"></div>
                </div>

                <div class="quota-detail">
                    <span>
                        Kuota terbatas
                    </span>

                    <strong>
                        76%
                    </strong>
                </div>

                <a
                    href="{{ route('awareness.pre-test') }}"
                    class="button button-primary button-full"
                >
                    Mulai Pre-Test
                </a>
            </div>
        </div>
    </section>

    <section
        id="informasi"
        class="information-section"
    >
        <div class="container">
            <div class="section-heading">
                <span class="badge">
                    Informasi Program
                </span>

                <h2>
                    Tahapan mengikuti program
                </h2>

                <p>
                    Program ini dibuat sebagai simulasi edukasi untuk
                    menunjukkan cara kerja social engineering pada serangan
                    phishing.
                </p>
            </div>

            <div class="step-grid">
                <article class="step-card">
                    <span class="step-number">
                        01
                    </span>

                    <h3>
                        Kerjakan pre-test
                    </h3>

                    <p>
                        Peserta mengerjakan evaluasi awal untuk mengetahui
                        tingkat pemahaman mengenai phishing.
                    </p>
                </article>

                <article class="step-card">
                    <span class="step-number">
                        02
                    </span>

                    <h3>
                        Ikuti simulasi
                    </h3>

                    <p>
                        Peserta melihat penawaran kuota dan halaman verifikasi
                        yang menyerupai pola phishing.
                    </p>
                </article>

                <article class="step-card">
                    <span class="step-number">
                        03
                    </span>

                    <h3>
                        Pelajari risikonya
                    </h3>

                    <p>
                        Sistem menjelaskan ciri-ciri phishing, data yang
                        diincar, dan cara mencegahnya.
                    </p>
                </article>

                <article class="step-card">
                    <span class="step-number">
                        04
                    </span>

                    <h3>
                        Kerjakan post-test
                    </h3>

                    <p>
                        Peserta mengerjakan evaluasi akhir untuk mengukur
                        peningkatan pemahaman setelah pelatihan.
                    </p>
                </article>
            </div>
        </div>
    </section>

    <section class="information-section awareness-note-section">
        <div class="container">
            <div class="notice-box">
                <strong>
                    Catatan Keamanan
                </strong>

                <p>
                    Website ini hanya digunakan untuk simulasi edukasi
                    keamanan informasi. Peserta tidak boleh memasukkan email,
                    nomor telepon, password, atau kode OTP asli.
                </p>
            </div>
        </div>
    </section>
@endsection