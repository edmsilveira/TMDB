@extends('layouts.app')

@section('title')
    Where
@endsection

@section('main')
    <where-component id="where"></where-component>
@endsection

@section('scripts')
    <script src="{{ asset('js/where.js') }}"></script>
@endsection
