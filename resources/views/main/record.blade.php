@extends('main.layout.master')


@push('styles')
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
@endpush

@section('content') 
    @include('main.components.navbar')
    @include('main.components.record')
@endsection

@push('scripts')
    <script src="/bootstrap/js/bootstrap.min.js"></script>
    <script src="/js/ajax-alumni-id-view-student.js"></script>
@endpush