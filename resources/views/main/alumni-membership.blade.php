@extends('main.layout.master')

@section('content') 
    @include('main.components.navbar')
    @include('main.components.alumni-membership')
    @include('main.components.footer')
@endsection

@push('scripts')
    <script src="/js/validation-alumni-mem.js"></script>
    <script src="/js/show-hide-payment.js"></script>
@endpush