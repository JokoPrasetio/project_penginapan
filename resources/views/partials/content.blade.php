@extends('partials.main')
@section('body')
      <!-- BANNER SLIDER -->
      <section class="section-slider">
        <h1 class="element-invisible">Slider</h1>
        <div id="slider-revolution">
            <ul>
                <li data-transition="fade">
                    <img src="images/slider/img-5.jpg" data-bgposition="left center" data-duration="14000" data-bgpositionend="right center" alt="">

                    <div class="tp-caption sft fadeout slider-caption-sub slider-caption-1" data-x="center" data-y="100" data-speed="700" data-start="1500" data-easing="easeOutBack">
                     <img src="images/slider/hom1-slide1.png" alt="icons">
                    </div>

                    <div class="tp-caption sft fadeout slider-caption-sub slider-caption-1" data-x="center" data-y="240" data-speed="700" data-start="1500" data-easing="easeOutBack">
                     WELCOME TO
                    </div>

                    <div class="tp-caption sfb fadeout slider-caption slider-caption-sub-1" data-x="center" data-y="280" data-speed="700" data-easing="easeOutBack"  data-start="2000">THE LOTUS HOTEL</div>

                    <a href="#" class="tp-caption sfb fadeout awe-btn awe-btn-12 awe-btn-slider" data-x="center" data-y="380" data-easing="easeOutBack" data-speed="700" data-start="2200">VIEW NOW</a>
                </li>

                <li data-transition="fade">
                    <img src="images/slider/img-4.jpg" data-bgposition="left center" data-duration="14000" data-bgpositionend="right center" alt="">

                    <div class="tp-caption sft fadeout" data-x="center" data-y="195" data-speed="700" data-start="1300" data-easing="easeOutBack">
                      <img src="images/icon-slider-1.png" alt="">
                    </div>

                    <div class="tp-caption sft fadeout slider-caption-sub slider-caption-sub-3" data-x="center" data-y="220" data-speed="700" data-start="1500" data-easing="easeOutBack">
                       EACH HOTEL IS
                    </div>

                    <div class="tp-caption sfb fadeout slider-caption slider-caption-3" data-x="center" data-y="260" data-speed="700" data-easing="easeOutBack"  data-start="2000">
                        UNIQUE 60%
                    </div>

                    <div class="tp-caption sfb fadeout slider-caption-sub slider-caption-sub-3" data-x="center" data-y="365" data-easing="easeOutBack" data-speed="700" data-start="2200">JUST LIKE YOU</div>

                    <div class="tp-caption sfb fadeout slider-caption-sub slider-caption-sub-3" data-x="center" data-y="395" data-easing="easeOutBack" data-speed="700" data-start="2400"><img src="images/icon-slider-2.png" alt=""></div>
                </li>

            </ul>
        </div>

    </section>
    <!-- END / BANNER SLIDER -->

    <!-- CHECK AVAILABILITY -->
    <section class="section-check-availability">
        <div class="container">
            <div class="check-availability">
                <div class="row v-align">
                    <div class="col-lg-3">
                        <h2 class="title-room">ROOMS & RATES</h2>
                    </div>
                    <div class="col-lg-9">
                        <div class="availability-form">
                            <input type="text" class="awe-calendar from" placeholder="Arrival Date">
                            <input type="text" class="awe-calendar to" placeholder="Departure Date">

                            <select class="awe-select">
                                <option>Adults</option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                            </select>
                            <select class="awe-select">
                                <option>Children</option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                            </select>
                            <div class="vailability-submit">
                                <button class="awe-btn awe-btn-13">FIND THE BEST RATE</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END / CHECK AVAILABILITY -->

    <!-- ACCOMMODATIONS -->
    <section class="section-accommo_1 bg-white">
        <div class="container">

            <div class="accomd-modations_1">

                <h2 class="heading">ACCOMMODATIONS</h2>

                <div class="accomd-modations-content_1" >

                    <div class="accomd-modations-slide_1" >

                        <!-- ITEM -->
                        <div class="accomd-modations-room_1">

                            <div class="img">
                                <a href="#"><img src="images/room/img-7.jpg" alt=""></a>
                            </div>

                            <div class="text">
                                <h2><a href="#">Luxury Room</a></h2>
                                <p class="desc">Cum sociis natoque penatibus et magnis dis part urient montes, nascetur ridiculus mus. Vestib ulum id ligula porta felis euis.</p>
                                <div class="wrap-price">
                                    <p class="price">
                                        <span class="amout">$320</span> /days
                                    </p>
                                    <a href="#" class="awe-btn awe-btn-default">VIEW DETAIL</a>
                                </div>
                            </div>

                        </div>
                        <!-- END / ITEM -->

                        <!-- ITEM -->
                        <div class="accomd-modations-room_1" >
                            <div class="img">
                                <a href="#"><img src="images/room/img-8.jpg" alt=""></a>
                            </div>
                            <div class="text">
                                <h2><a href="#">Luxury Room</a></h2>
                                <p class="desc">Cum sociis natoque penatibus et magnis dis part urient montes, nascetur ridiculus mus. Vestib ulum id ligula porta felis euis.</p>
                                <div class="wrap-price">
                                    <p class="price">
                                        <span class="amout">$320</span> /days
                                    </p>
                                    <a href="#" class="awe-btn awe-btn-default">VIEW DETAIL</a>
                                </div>
                            </div>
                        </div>
                        <!-- END / ITEM -->

                        <!-- ITEM -->
                        <div class="accomd-modations-room_1">
                            <div class="img">
                                <a href="#"><img src="images/room/img-9.jpg" alt=""></a>
                            </div>
                            <div class="text">
                                <h2><a href="#">Luxury Room</a></h2>
                                <p class="desc">Cum sociis natoque penatibus et magnis dis part urient montes, nascetur ridiculus mus. Vestib ulum id ligula porta felis euis.</p>
                                <div class="wrap-price">
                                    <p class="price">
                                        <span class="amout">$320</span> /days
                                    </p>
                                    <a href="#" class="awe-btn awe-btn-default">VIEW DETAIL</a>
                                </div>
                            </div>
                        </div>
                        <!-- END / ITEM -->

                        <!-- ITEM -->
                        <div class="accomd-modations-room_1">
                            <div class="img">
                                <a href="#"><img src="images/room/img-7.jpg" alt=""></a>
                            </div>
                            <div class="text">
                                <h2><a href="#">Luxury Room</a></h2>
                                <p class="desc">Cum sociis natoque penatibus et magnis dis part urient montes, nascetur ridiculus mus. Vestib ulum id ligula porta felis euis.</p>
                                <div class="wrap-price">
                                    <p class="price">
                                        <span class="amout">$320</span> /days
                                    </p>
                                    <a href="#" class="awe-btn awe-btn-default">VIEW DETAIL</a>
                                </div>
                            </div>
                        </div>
                        <!-- END / ITEM -->

                    </div>
                    <div class="accomd-modations-slide_1" >

                        <!-- ITEM -->
                        <div class="accomd-modations-room_1">

                            <div class="img">
                                <a href="#"><img src="images/room/img-7.jpg" alt=""></a>
                            </div>

                            <div class="text">
                                <h2><a href="#">Luxury Room</a></h2>
                                <p class="desc">Cum sociis natoque penatibus et magnis dis part urient montes, nascetur ridiculus mus. Vestib ulum id ligula porta felis euis.</p>
                                <div class="wrap-price">
                                    <p class="price">
                                        <span class="amout">$320</span> /days
                                    </p>
                                    <a href="#" class="awe-btn awe-btn-default">VIEW DETAIL</a>
                                </div>
                            </div>

                        </div>
                        <!-- END / ITEM -->

                        <!-- ITEM -->
                        <div class="accomd-modations-room_1">
                            <div class="img">
                                <a href="#"><img src="images/room/img-8.jpg" alt=""></a>
                            </div>
                            <div class="text">
                                <h2><a href="#">Luxury Room</a></h2>
                                <p class="desc">Cum sociis natoque penatibus et magnis dis part urient montes, nascetur ridiculus mus. Vestib ulum id ligula porta felis euis.</p>
                                <div class="wrap-price">
                                    <p class="price">
                                        <span class="amout">$320</span> /days
                                    </p>
                                    <a href="#" class="awe-btn awe-btn-default">VIEW DETAIL</a>
                                </div>
                            </div>
                        </div>
                        <!-- END / ITEM -->

                        <!-- ITEM -->
                        <div class="accomd-modations-room_1">
                            <div class="img">
                                <a href="#"><img src="images/room/img-9.jpg" alt=""></a>
                            </div>
                            <div class="text">
                                <h2><a href="#">Luxury Room</a></h2>
                                <p class="desc">Cum sociis natoque penatibus et magnis dis part urient montes, nascetur ridiculus mus. Vestib ulum id ligula porta felis euis.</p>
                                <div class="wrap-price">
                                    <p class="price">
                                        <span class="amout">$320</span> /days
                                    </p>
                                    <a href="#" class="awe-btn awe-btn-default">VIEW DETAIL</a>
                                </div>
                            </div>
                        </div>
                        <!-- END / ITEM -->

                        <!-- ITEM -->
                        <div class="accomd-modations-room_1">
                            <div class="img">
                                <a href="#"><img src="images/room/img-7.jpg" alt=""></a>
                            </div>
                            <div class="text">
                                <h2><a href="#">Luxury Room</a></h2>
                                <p class="desc">Cum sociis natoque penatibus et magnis dis part urient montes, nascetur ridiculus mus. Vestib ulum id ligula porta felis euis.</p>
                                <div class="wrap-price">
                                    <p class="price">
                                        <span class="amout">$320</span> /days
                                    </p>
                                    <a href="#" class="awe-btn awe-btn-default">VIEW DETAIL</a>
                                </div>
                            </div>
                        </div>
                        <!-- END / ITEM -->

                    </div>

                </div>
            </div>

        </div>
    </section>
    <!-- ACCOMMODATIONS -->

    <!-- ABOUT -->
    <section class="section-home-about bg-white">
        <div class="container">
            <div class="home-about">
                <div class="row">
                    <div class="col-md-6">
                        <div class="img">
                            <a href="#"><img src="images/home/about/img-1.jpg" alt=""></a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="text">
                            <h2 class="heading">ABOUT US</h2>
                            <span>Lorem Ipsum is simply dummy text</span>
                            <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source</p>
                            <a href="#" class="awe-btn awe-btn-default">READ MORE</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END / ABOUT -->

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
    @yield('body_content')
@endsection
