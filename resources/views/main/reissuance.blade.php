@extends('main.layout.master')

@section('content') 
    @include('main.components.navbar')
    @include('main.components.reissuance')
    @include('main.components.footer')
@endsection

@push('scripts')
    <script src="/js/validation-reissueance.js"></script>
@endpush