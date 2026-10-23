@extends('layouts.app')

@section('title', 'About')
@section('description', 'About Zulhusni Adam, a programmer at ProtectHealth.')

@section('content')
    <div class="container page-hero">
        <a href="{{ route('home') }}" class="back">&larr; Back to home</a>
    </div>

    @include('partials.about')
@endsection
