@extends('layouts.awareness')

@section('title', 'Anda Mengikuti Simulasi Phishing')

@section('content')
    <section class="education-section">
        <div class="container education-container">
            <div class="education-alert">
                <div class="alert-icon">
                    !
                </div>

                <span class="badge badge-danger">
                    Simulasi Selesai
                </span>

                <h1>
                    Anda baru saja mengikuti simulasi phishing
                </h1>

                <p>
                    Penawaran kuota gratis digunakan untuk menarik perhatian
                    dan membuat pengguna memberikan informasi pribadi tanpa
                    memeriksa keamanan halaman terlebih dahulu.
                </p>

                <div class="safe-message">
                    Tidak ada data yang disimpan atau dikirim dalam simulasi ini.
                </div>
            </div>

            <div class="education-grid">
                <article class="education-card">
                    <span class="card-icon">01</span>

                    <h2>Iming-iming hadiah</h2>

                    <p>
                        Pelaku menawarkan kuota, beasiswa, hadiah, atau promo
                        agar korban tertarik membuka tautan.
                    </p>
                </article>

                <article class="education-card">
                    <span class="card-icon">02</span>

                    <h2>Pesan mendesak</h2>

                    <p>
                        Korban didorong bertindak cepat melalui kalimat seperti
                        kuota terbatas atau akun akan segera dinonaktifkan.
                    </p>
                </article>

                <article class="education-card">
                    <span class="card-icon">03</span>

                    <h2>Permintaan data akun</h2>

                    <p>
                        Halaman palsu biasanya meminta email, password, OTP,
                        nomor telepon, atau informasi pribadi lainnya.
                    </p>
                </article>

                <article class="education-card">
                    <span class="card-icon">04</span>

                    <h2>Alamat website mencurigakan</h2>

                    <p>
                        Domain phishing sering berbeda dari domain resmi atau
                        menggunakan nama yang sengaja dibuat mirip.
                    </p>
                </article>
            </div>

            <div class="prevention-section">
                <div>
                    <span class="badge">
                        Cara Mencegah
                    </span>

                    <h2>
                        Periksa sebelum mengeklik
                    </h2>
                </div>

                <div class="prevention-list">
                    <div class="prevention-item">
                        <span>✓</span>

                        <p>
                            Periksa alamat pengirim dan domain website.
                        </p>
                    </div>

                    <div class="prevention-item">
                        <span>✓</span>

                        <p>
                            Jangan memberikan password atau kode OTP.
                        </p>
                    </div>

                    <div class="prevention-item">
                        <span>✓</span>

                        <p>
                            Jangan mudah percaya pada hadiah yang terlalu
                            menarik.
                        </p>
                    </div>

                    <div class="prevention-item">
                        <span>✓</span>

                        <p>
                            Aktifkan autentikasi dua faktor pada akun penting.
                        </p>
                    </div>

                    <div class="prevention-item">
                        <span>✓</span>

                        <p>
                            Segera ganti password jika terlanjur mengisinya
                            pada halaman mencurigakan.
                        </p>
                    </div>
                </div>
            </div>

            <div class="education-actions">
                <a
                    href="{{ route('awareness.home') }}"
                    class="button button-secondary"
                >
                    Kembali ke Beranda
                </a>

                <a
                    href="{{ route('awareness.simulation') }}"
                    class="button button-secondary"
                >
                    Ulangi Simulasi
                </a>

                <a
                    href="{{ route('awareness.post-test') }}"
                    class="button button-primary"
                >
                    Lanjut ke Post-Test
                </a>
            </div>
        </div>
    </section>
@endsection