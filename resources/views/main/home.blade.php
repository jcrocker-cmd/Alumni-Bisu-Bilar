@extends('main.layout.master')

@section('content') 
    @include('main.components.navbar')
    @include('main.components.home-components')
    @include('main.components.news-announcements')
    @include('main.components.about')
    @include('main.components.footer')
@endsection


@push('scripts')
    <script src="/js/scrollanchor.js"></script>
@endpush
