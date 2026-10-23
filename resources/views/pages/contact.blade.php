@extends('layouts.app')

@section('title', 'Contact')
@section('description', 'Get in touch with Zulhusni Adam.')

@section('content')
    <div class="container page-hero">
        <a href="{{ route('home') }}" class="back">&larr; Back to home</a>
    </div>

    @include('partials.contact')
@endsection
