<div class="simulation-form-grid">
    <div class="form-information">
        <span class="badge">
            Simulasi Verifikasi
        </span>

        <h1>
            Verifikasi penerima kuota
        </h1>

        <p>
            Masukkan data dummy untuk mendemonstrasikan bagaimana
            halaman phishing mencoba memperoleh informasi pengguna.
        </p>

        <div class="notice-box">
            <strong>Gunakan data simulasi</strong>

            <p>
                Jangan memasukkan email atau password asli.
                Sistem hanya menerima domain email
                <strong>@example.test</strong>.
            </p>
        </div>

        <div class="credential-example">
            <div class="credential-row">
                <span>Kode peserta</span>

                <strong>
                    {{ $participantCode }}
                </strong>
            </div>

            <div class="credential-row">
                <span>Contoh email</span>

                <strong>
                    peserta-{{ strtolower($participantCode) }}@example.test
                </strong>
            </div>

            <div class="credential-row">
                <span>Password simulasi</span>

                <strong>
                    {{ $expectedPassword }}
                </strong>
            </div>
        </div>

        <ul class="information-list">
            <li>Email dummy akan disimpan untuk evaluasi.</li>
            <li>Password hanya disimpan dalam bentuk tersamarkan.</li>
            <li>Tidak ada OTP atau password asli yang diminta.</li>
        </ul>
    </div>

    <div class="form-card">
        <div class="form-card-header">
            <h2>
                Form klaim kuota
            </h2>

            <p>
                Isi sesuai data simulasi yang diberikan.
            </p>
        </div>

        <form wire:submit="submit">
            <div class="form-group">
                <label for="simulated-email">
                    Email mahasiswa
                </label>

                <input
                    id="simulated-email"
                    type="email"
                    wire:model="email"
                    placeholder="peserta01@example.test"
                    autocomplete="off"
                >

                @error('email')
                    <p class="form-error form-error-left">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div class="form-group">
                <label for="simulated-password">
                    Password simulasi
                </label>

                <input
                    id="simulated-password"
                    type="password"
                    wire:model="password"
                    placeholder="{{ $expectedPassword }}"
                    autocomplete="new-password"
                >

                @error('password')
                    <p class="form-error form-error-left">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div class="safe-information">
                <strong>Format yang wajib digunakan:</strong>

                <code>
                    {{ $expectedPassword }}
                </code>
            </div>

            <button
                type="submit"
                class="button button-primary button-full"
                wire:loading.attr="disabled"
            >
                <span wire:loading.remove>
                    Verifikasi dan Klaim Kuota
                </span>

                <span wire:loading>
                    Menyimpan simulasi...
                </span>
            </button>
        </form>
    </div>
</div>