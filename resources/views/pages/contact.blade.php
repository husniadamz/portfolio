@extends('layouts.app')

@section('title', 'Contact')
@section('description', 'Get in touch with Zulhusni Adam.')

@section('content')
    <div class="container page-hero">
        <a href="{{ route('home') }}" class="back">&larr; Back to home</a>
    </div>

    <section id="contact">
        <div class="container">
            <div class="contact-card">
                <div class="section-label">04 / Contact</div>
                <h2 class="section-title">Let's build something together</h2>
                <p>Have a project, a question, or an opportunity? My inbox is open.</p>
                <a href="mailto:hello@example.com" class="btn btn-primary">Send an email</a>
            </div>
        </div>
    </section>
@endsection
