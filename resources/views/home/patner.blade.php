<section class="section-our-best bg-white">
    <div class="container">
        <div class="our-best">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text text-center">
                        <h2 class="heading">BLOG</h2>
                        <!--<p>Collaborating With Industry Leaders To Deliver Exceptional Service</span>-->
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top: 4rem;">
                @foreach ($blogs as $blog)
                    @php
                        $excerpt = strip_tags($blog->excerpt->rendered);
                        $words = explode(' ', $excerpt);
                        $excerptTrimmed = implode(' ', array_slice($words, 0, 10));
                    @endphp
                    <div class="col-md-4">
                        <div class="room_item-1" style="padding: 20px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">

                            <div class="img">
                                <a href="{{ $blog->link }}" target="_blank"><img src=" {{$blog->img ? $blog->img : asset('images/img/pondok-panji-ubud.jpg') }}" alt="img.jpg" style="height:200px; width:100%; object-fit: cover;"></a>
                            </div>

                            <div class="desc">
                                <h4 style="font-weight: 600">{{ $blog->title->rendered }}</h4>
                                <p>{{ $excerptTrimmed }}</p>
                            </div>

                            <div class="bot">
                                <span class="price">{{ date('F j, Y', strtotime($blog->date)) }}</span>
                                <a href="{{ $blog->link }}" target="_blank" class="awe-btn awe-btn-13">VIEW DETAILS</a>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
            <!--<div class="row text-center" style="margin-top: 4rem;">-->
            <!--    <div class="col-md-3">-->
            <!--            <img src="/images/patner/booking.png" width="150">-->
            <!--    </div>-->
            <!--    <div class="col-md-3" style="margin-top:1rem;">-->
            <!--        <img src="/images/patner/airbnb.png" width="150">-->
            <!--    </div>-->
            <!--    <div class="col-md-3" >-->
            <!--        <img src="/images/patner/hotels.png" width="150">-->
            <!--    </div>-->
            <!--    <div class="col-md-3" style="margin-top:2.6rem;">-->
            <!--        <img src="/images/patner/homeaway.png" width="150">-->
            <!--    </div>-->
            <!--</div>-->
            <!--<div class="row text-center" style="margin-top: 2rem;">-->
            <!--    <div class="col-md-2">-->
            <!--        <img src="/images/patner/expedia.png" width="150">-->
            <!--    </div>-->
            <!--    <div class="col-md-3" style="margin-top: 3.2rem;">-->
            <!--        <img src="/images/patner/tiketcom.png" width="150">-->
            <!--    </div>-->
            <!--    <div class="col-md-2" style="margin-top: 2.2rem;">-->
            <!--        <img src="/images/patner/traveloka.png" width="150">-->
            <!--    </div>-->
            <!--    <div class="col-md-3">-->
            <!--        <img src="/images/patner/agoda.png" width="150">-->
            <!--    </div>-->
            <!--    <div class="col-md-2" style="margin-top: 2.9rem;">-->
            <!--        <img src="/images/patner/tripadvisor.png" width="150">-->
            <!--    </div>-->
            <!--</div>-->
        </div>
    </div>
</section>
