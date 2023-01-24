@extends('main.layout.master')

@section('styles')
    @include('main.assets.bootstrapcss')
 @endsection

@section('content') 
    @include('main.components.home-com)
@endsection

@section('scripts')
    @include('main.assets.bootstrapjs')
    @include('main.assets.scripts')
@endsection

