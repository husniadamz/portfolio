@extends('layouts.app')

@section('title', 'About')
@section('description', 'About Zulhusni Adam, a programmer at ProtectHealth.')

@section('content')
    <div class="container page-hero">
        <a href="{{ route('home') }}" class="back">&larr; Back to home</a>
    </div>

    <section id="about">
        <div class="container">
            <div class="section-label">01 / About</div>
            <h2 class="section-title">Engineering with purpose</h2>

            <div class="about-grid">
                <div>
                    <p>
                        I'm a programmer at ProtectHealth, where I work on software that supports
                        health and wellbeing. I care about writing code that is easy to read,
                        easy to maintain and robust when it matters most.
                    </p>
                    <p>
                        My approach is simple: understand the problem first, keep the solution as
                        small as it needs to be, and test it properly before it ships.
                    </p>
                </div>

                <div class="stats">
                    <div class="stat"><strong>ProtectHealth</strong><span>Current company</span></div>
                    <div class="stat"><strong>Full-stack</strong><span>Development focus</span></div>
                    <div class="stat"><strong>Always</strong><span>Learning new tools</span></div>
                </div>
            </div>
        </div>
    </section>
@endsection
