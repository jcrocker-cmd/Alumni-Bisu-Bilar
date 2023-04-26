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
    <script src="/js/moment-library.js"></script>

    <script src="/js/ajax-alumni-id-view-student.js"></script>
    <script src="/js/ajax-alumni-id-edit-student.js"></script>

    <script src="/js/ajax-alumni-mem-view-student.js"></script>
    <script src="/js/ajax-alumni-mem-edit-student.js"></script>

    <script src="/js/ajax-reissueance-view-student.js"></script>
    <script src="/js/ajax-reissueance-edit-student.js"></script>

    <script src="/js/edit-photo-aid.js"></script>
    <script src="/js/edit-photo-amem.js"></script>
    <script src="/js/edit-photo-reissue.js"></script>
    
@endpush