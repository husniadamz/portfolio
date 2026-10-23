@extends('layouts.app')

@section('title', 'Stack')
@section('description', 'Tools and technologies Zulhusni Adam uses.')

@section('content')
    <div class="container page-hero">
        <a href="{{ route('home') }}" class="back">&larr; Back to home</a>
    </div>

    @include('partials.stack')
@endsection
