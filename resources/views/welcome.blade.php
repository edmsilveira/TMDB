@extends('layouts.app')

@section('title')
    TMDb List
@endsection

@section('main')
    <feed-component id="feed"></feed-component>
@endsection

@section('scripts')
    <script src="{{ asset('js/feed.js') }}"></script>
@endsection