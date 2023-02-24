@extends('main.layout.master')

@section('content') 
    @include('main.components.navbar')
    @include('main.components.alumni-id')
    @include('main.components.footer')
@endsection

@push('scripts')
    <script src="/js/validation-alumni-id.js"></script>
@endpush