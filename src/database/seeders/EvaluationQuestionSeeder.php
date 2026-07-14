<?php

namespace Database\Seeders;

use App\Models\EvaluationQuestion;
use Illuminate\Database\Seeder;

class EvaluationQuestionSeeder extends Seeder
{
    public function run(): void
    {
        $questions = [
            [
                'question' => 'Apa yang dimaksud dengan phishing?',
                'options' => [
                    'A' => 'Upaya memperoleh data melalui penyamaran atau penipuan',
                    'B' => 'Proses mempercepat koneksi internet',
                    'C' => 'Metode mencadangkan database',
                    'D' => 'Sistem untuk memperbarui aplikasi',
                ],
                'correct_answer' => 'A',
                'sort_order' => 1,
            ],
            [
                'question' => 'Apa yang sebaiknya diperiksa sebelum membuka sebuah tautan?',
                'options' => [
                    'A' => 'Warna tombol',
                    'B' => 'Alamat domain dan identitas pengirim',
                    'C' => 'Ukuran tulisan',
                    'D' => 'Jumlah gambar',
                ],
                'correct_answer' => 'B',
                'sort_order' => 2,
            ],
            [
                'question' => 'Data manakah yang tidak boleh diberikan kepada orang lain?',
                'options' => [
                    'A' => 'Nama panggilan',
                    'B' => 'Jurusan kuliah',
                    'C' => 'Password dan kode OTP',
                    'D' => 'Nama mata kuliah',
                ],
                'correct_answer' => 'C',
                'sort_order' => 3,
            ],
            [
                'question' => 'Apa tindakan yang tepat ketika menerima penawaran hadiah mencurigakan?',
                'options' => [
                    'A' => 'Langsung membuka tautan',
                    'B' => 'Membagikannya ke teman',
                    'C' => 'Memasukkan akun untuk mencoba',
                    'D' => 'Memeriksa sumber melalui kanal resmi',
                ],
                'correct_answer' => 'D',
                'sort_order' => 4,
            ],
            [
                'question' => 'Apa yang harus dilakukan jika terlanjur memasukkan password pada halaman mencurigakan?',
                'options' => [
                    'A' => 'Mengganti password dan mengaktifkan autentikasi dua faktor',
                    'B' => 'Menunggu sampai akun bermasalah',
                    'C' => 'Mengirim password kepada teman',
                    'D' => 'Membuka kembali halaman tersebut',
                ],
                'correct_answer' => 'A',
                'sort_order' => 5,
            ],
        ];

        foreach ($questions as $question) {
            EvaluationQuestion::query()->updateOrCreate(
                [
                    'sort_order' => $question['sort_order'],
                ],
                [
                    ...$question,
                    'is_active' => true,
                ],
            );
        }
    }
}