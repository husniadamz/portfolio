@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="container hero">
        <div>
            <span class="badge reveal"><span class="status-dot"></span> Available for new projects</span>

            <h1 class="reveal d1">
                Hi, I'm <span class="gradient-text">Zulhusni Adam</span>
            </h1>

            <p class="lead reveal d2">
                Programmer at <strong>ProtectHealth</strong>, building reliable,
                clean and user-focused software that solves real problems.
            </p>

            <div class="hero-actions reveal d3">
                <a href="{{ route('contact') }}" class="btn btn-primary">Let's work together &rarr;</a>
                <a href="#about" class="btn btn-ghost">About me</a>
            </div>
        </div>

        <div class="terminal reveal d2" aria-hidden="true">
            <div class="terminal-bar"><span></span><span></span><span></span></div>
            <div class="terminal-body">
                <div><span class="prompt">~</span> whoami</div>
                <div>zulhusni adam</div>
                <div><span class="prompt">~</span> cat role.txt</div>
                <div><span class="key">role</span>: <span class="str">"programmer"</span></div>
                <div><span class="key">company</span>: <span class="str">"protecthealth"</span></div>
                <div><span class="key">focus</span>: <span class="str">"clean code, healthcare tech"</span></div>
                <div><span class="prompt">~</span> <span class="cursor"></span></div>
            </div>
        </div>
    </div>

    @include('partials.projects')
    @include('partials.about')
    @include('partials.focus')
    @include('partials.stack')
    @include('partials.experience')
    @include('partials.contact')
@endsection
