@extends('layouts.app')

@section('title', 'Focus')
@section('description', 'What Zulhusni Adam focuses on: web applications, backend APIs and healthcare systems.')

@section('content')
    <div class="container page-hero">
        <a href="{{ route('home') }}" class="back">&larr; Back to home</a>
    </div>

    @include('partials.focus')
@endsection
