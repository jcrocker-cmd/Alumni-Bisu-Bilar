@extends('main.layout.master')


@push('styles')
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
@endpush

@section('content') 
    @include('main.components.navbar')
    @include('main.components.account')
@endsection

@push('scripts')
    
@endpush