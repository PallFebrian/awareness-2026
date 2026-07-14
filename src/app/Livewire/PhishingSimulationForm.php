<?php

namespace App\Livewire;

use App\Models\PhishingSubmission;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Livewire\Component;

class PhishingSimulationForm extends Component
{
    public string $email = '';

    public string $password = '';

    public string $participantCode = '';

    public string $expectedPassword = '';

    public function mount(): void
    {
        $this->participantCode = session()->get(
            'phishing_participant_code',
            Str::upper(Str::random(6)),
        );

        session()->put(
            'phishing_participant_code',
            $this->participantCode,
        );

        $this->expectedPassword = 'DUMMY-' . $this->participantCode;
    }

    protected function rules(): array
    {
        return [
            'email' => [
                'required',
                'string',
                'max:100',
                'regex:/^[A-Za-z0-9._%+-]+@example\.test$/i',
            ],

            'password' => [
                'required',
                'string',
                'max:30',
                Rule::in([
                    $this->expectedPassword,
                ]),
            ],
        ];
    }

    protected function messages(): array
    {
        return [
            'email.required' => 'Email simulasi wajib diisi.',

            'email.regex' => implode(' ', [
                'Gunakan email dummy dengan domain @example.test.',
                'Contoh: peserta01@example.test.',
            ]),

            'password.required' => 'Password simulasi wajib diisi.',

            'password.in' => sprintf(
                'Password simulasi harus menggunakan: %s',
                $this->expectedPassword,
            ),
        ];
    }

    public function submit(): void
    {
        $validated = $this->validate();

        PhishingSubmission::query()->create([
            'participant_code' => $this->participantCode,

            'simulated_email' => strtolower(
                $validated['email'],
            ),

            'password_masked' => $this->maskPassword(
                $validated['password'],
            ),

            'password_length' => mb_strlen(
                $validated['password'],
            ),

            'format_valid' => true,
            'submitted_at' => now(),
        ]);

        session()->flash(
            'simulation_submitted',
            'Submission simulasi berhasil disimpan.',
        );

        $this->reset([
            'email',
            'password',
        ]);

        $this->redirectRoute(
            'awareness.education',
        );
    }

    private function maskPassword(string $password): string
    {
        $prefix = 'DUMMY-';

        $codeLength = max(
            mb_strlen($password) - mb_strlen($prefix),
            4,
        );

        return $prefix . str_repeat('*', $codeLength);
    }

    public function render(): View
    {
        return view('livewire.phishing-simulation-form');
    }
}