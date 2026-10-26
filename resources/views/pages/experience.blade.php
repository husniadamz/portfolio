@extends('layouts.app')

@section('title', 'Experience')
@section('description', 'Work experience of Zulhusni Adam, a programmer at ProtectHealth.')

@section('content')
    <div class="container page-hero">
        <a href="{{ route('home') }}" class="back">&larr; Back to home</a>
    </div>

    @include('partials.experience')
@endsection
