<div class="quiz-wrapper">
    @if ($completed)
        <div class="quiz-result">
            <span class="badge">
                {{ $phase === 'pre' ? 'Pre-Test Selesai' : 'Post-Test Selesai' }}
            </span>

            <h1>
                Hasil evaluasi
            </h1>

            <div class="score-circle">
                {{ number_format((float) $result['percentage'], 0) }}%
            </div>

            <p>
                Jawaban benar:
                <strong>
                    {{ $result['score'] }}
                    dari
                    {{ $result['total_questions'] }}
                    pertanyaan
                </strong>
            </p>

            @if ($phase === 'pre')
                <p class="quiz-description">
                    Selanjutnya, ikuti simulasi phishing dan pelajari
                    ciri-ciri serangannya.
                </p>

                <div class="quiz-action-group">
                    <a
                        href="{{ route('awareness.simulation') }}"
                        class="button button-primary"
                    >
                        Lanjut ke Simulasi
                    </a>

                    <button
                        type="button"
                        wire:click="retake"
                        class="button button-secondary"
                    >
                        Isi Ulang Pre-Test
                    </button>
                </div>
            @else
                <p class="quiz-description">
                    Post-test selesai. Nilai ini dapat digunakan sebagai
                    pembanding setelah peserta mengikuti simulasi.
                </p>

                <div class="quiz-action-group">
                    <a
                        href="{{ route('awareness.home') }}"
                        class="button button-secondary"
                    >
                        Kembali ke Beranda
                    </a>

                    <button
                        type="button"
                        wire:click="retake"
                        class="button button-primary"
                    >
                        Isi Ulang Post-Test
                    </button>
                </div>
            @endif
        </div>
    @else
        <div class="quiz-header">
            <span class="badge">
                {{ $phase === 'pre' ? 'Pre-Test' : 'Post-Test' }}
            </span>

            <h1>
                {{ $phase === 'pre'
                    ? 'Uji pemahaman awal'
                    : 'Evaluasi setelah pelatihan' }}
            </h1>

            <p>
                Pilih satu jawaban yang paling tepat pada setiap pertanyaan.
                Sistem tidak meminta nama, email, nomor telepon, atau password.
            </p>
        </div>

        <form wire:submit="submit">
            @forelse ($questions as $question)
                <article
                    class="question-card"
                    wire:key="question-{{ $question->id }}"
                >
                    <div class="question-number">
                        Pertanyaan {{ $loop->iteration }}
                    </div>

                    <h2>
                        {{ $question->question }}
                    </h2>

                    <div class="answer-list">
                        @foreach ($question->options as $key => $option)
                            <label class="answer-option">
                                <input
                                    type="radio"
                                    wire:model="answers.{{ $question->id }}"
                                    value="{{ $key }}"
                                >

                                <span class="answer-code">
                                    {{ $key }}
                                </span>

                                <span>
                                    {{ $option }}
                                </span>
                            </label>
                        @endforeach
                    </div>

                    @error("answers.{$question->id}")
                        <p class="form-error">
                            {{ $message }}
                        </p>
                    @enderror
                </article>
            @empty
                <div class="notice-box">
                    Belum ada pertanyaan evaluasi yang aktif.
                </div>
            @endforelse

            @error('quiz')
                <p class="form-error">
                    {{ $message }}
                </p>
            @enderror

            @if ($questions->isNotEmpty())
                <button
                    type="submit"
                    class="button button-primary button-full"
                    wire:loading.attr="disabled"
                >
                    <span wire:loading.remove>
                        Kirim Jawaban
                    </span>

                    <span wire:loading>
                        Menghitung nilai...
                    </span>
                </button>
            @endif
        </form>
    @endif
</div>