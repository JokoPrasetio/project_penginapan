@extends('partials.content')
@section('body_content')

       <!-- CHECK AVAILABILITY -->
        @include('home.filter')
    <!-- END / CHECK AVAILABILITY -->

     <!-- ABOUT -->
        @include('home.about')
    <!-- END / ABOUT -->

   <!-- Our Properties -->
        @include('home.ourproperties')
    <!-- END / Our Properties -->


        @include('home.patner')

    <script src="/js/main/redirect.js"></script>
@endsection
