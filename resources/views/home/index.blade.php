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
    <!-- OUR BEST -->
    <section class="section-our-best bg-white">
        <div class="container">

            <div class="our-best">
                <div class="row">

                    <div class="col-md-6 col-md-push-6">
                        <div class="img">
                            <img src="images/home/ourbest/img-1.jpg" alt="">
                        </div>
                    </div>

                    <div class="col-md-6 col-md-pull-6 ">
                        <div class="text">
                            <h2 class="heading">Our Best</h2>
                            <p>One of Catalina Island's best-loved hotels, Hotel Vista Del Mar is recognized as one of Avalon's leading hotels with gracious island hospitality, thoughtful amenities and distinctive .</p>
                            <ul>
                                <li><img src="images/home/ourbest/icon-3.png" alt="icon">250 Best Rooms  5 Star</li>
                                <li><img src="images/home/ourbest/icon-2.png" alt="icon">Wet Bar with Refrigerator</li>
                                <li><img src="images/home/ourbest/icon-4.png" alt="icon">Double Whirlpool Jacuzzi Tub</li>
                                <li><img src="images/home/ourbest/icon-5.png" alt="icon">Luxurious High Thread Count </li>
                                <li><img src="images/home/ourbest/icon-1.png" alt="icon">Breakfast each morning</li>
                                <li><img src="images/home/ourbest/icon-6.png" alt="icon">Ocean Views to lotus Hotel</li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>
    <!-- END / OUR BEST -->

    <script src="/js/main/redirect.js"></script>
@endsection
