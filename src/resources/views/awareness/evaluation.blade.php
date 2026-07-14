@extends('layouts.awareness')

@section(
    'title',
    $phase === 'pre'
        ? 'Pre-Test Security Awareness'
        : 'Post-Test Security Awareness'
)

@section('content')
    <section class="evaluation-section">
        <div class="container evaluation-container">
            <livewire:evaluation-quiz :phase="$phase" />
        </div>
    </section>
@endsection