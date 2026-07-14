<?php

namespace App\Livewire;

use App\Models\EvaluationQuestion;
use App\Models\EvaluationResult;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Livewire\Component;

class EvaluationQuiz extends Component
{
    public string $phase = 'pre';

    public string $participantCode = '';

    public array $answers = [];

    public bool $completed = false;

    public array $result = [];

    public function mount(string $phase = 'pre'): void
    {
        abort_unless(
            in_array($phase, ['pre', 'post'], true),
            404,
        );

        $this->phase = $phase;

        $this->participantCode = session()->get(
            'awareness_participant_code',
            Str::uuid()->toString(),
        );

        session()->put(
            'awareness_participant_code',
            $this->participantCode,
        );

        $existingResult = EvaluationResult::query()
            ->where('participant_code', $this->participantCode)
            ->where('phase', $this->phase)
            ->first();

        if ($existingResult) {
            $this->completed = true;

            $this->result = [
                'score' => $existingResult->score,
                'total_questions' => $existingResult->total_questions,
                'percentage' => $existingResult->percentage,
            ];
        }
    }

    public function submit(): void
    {
        $questions = $this->getQuestions();

        if ($questions->isEmpty()) {
            $this->addError(
                'quiz',
                'Belum ada pertanyaan evaluasi yang aktif.',
            );

            return;
        }

        $rules = [];

        foreach ($questions as $question) {
            $rules["answers.{$question->id}"] = [
                'required',
                Rule::in(array_keys($question->options)),
            ];
        }

        $this->validate(
            $rules,
            [
                'answers.*.required' => 'Semua pertanyaan wajib dijawab.',
                'answers.*.in' => 'Pilihan jawaban tidak valid.',
            ],
        );

        $score = 0;

        foreach ($questions as $question) {
            $selectedAnswer = $this->answers[$question->id] ?? null;

            if ($selectedAnswer === $question->correct_answer) {
                $score++;
            }
        }

        $totalQuestions = $questions->count();

        $percentage = $totalQuestions > 0
            ? round(($score / $totalQuestions) * 100, 2)
            : 0;

        $evaluationResult = EvaluationResult::query()->updateOrCreate(
            [
                'participant_code' => $this->participantCode,
                'phase' => $this->phase,
            ],
            [
                'score' => $score,
                'total_questions' => $totalQuestions,
                'percentage' => $percentage,
                'answers' => $this->answers,
                'completed_at' => now(),
            ],
        );

        $this->result = [
            'score' => $evaluationResult->score,
            'total_questions' => $evaluationResult->total_questions,
            'percentage' => $evaluationResult->percentage,
        ];

        $this->answers = [];
        $this->completed = true;
    }

    public function retake(): void
    {
        EvaluationResult::query()
            ->where('participant_code', $this->participantCode)
            ->where('phase', $this->phase)
            ->delete();

        $this->answers = [];
        $this->result = [];
        $this->completed = false;

        $this->resetErrorBag();
        $this->resetValidation();
    }

    private function getQuestions(): Collection
    {
        return EvaluationQuestion::query()
            ->active()
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();
    }

    public function render(): View
    {
        return view('livewire.evaluation-quiz', [
            'questions' => $this->getQuestions(),
        ]);
    }
}