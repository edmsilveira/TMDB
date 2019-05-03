@extends('layouts.app')

@section('title')
    Search
@endsection

@section('main')
    <search-component id="seek"></search-component>
@endsection

@section('scripts')
    <script src="{{ asset('js/search.js') }}"></script>
@endsection
