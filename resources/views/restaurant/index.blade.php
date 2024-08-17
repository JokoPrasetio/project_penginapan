@extends('partials.content')

@section('body_content')
<section class="section-restaurant-4 bg-white" id="restaurant">
    <div class="container">

        <div class="restaurant-tabs" style="padding: 4px">

            <div class="tabs tabs-restaurant">


                <div class="icon-restaurant text-center">
                    <i class="lotus-icon-cooker-hood"></i>
                    @if(auth()->user())
                    <div style="display: flex; justify-content: flex-end; margin-bottom:3rem;">
                        <button type="button" class="btn btn-primary" style="font-size: 1.3rem; margin-right: 12px;" data-toggle="modal" data-target="#myModal">Add Item</button>
                        <button type="button" class="btn btn-primary" style="font-size: 1.3rem; margin-right: 12px;">Report</button>
                    </div>
                    @endif
                    @include('partials.alert')
                </div>

                <ul>
                    <li><a href="#tabs-1">Food <i class="fa-solid fa-pizza-slice"></i></a></li>
                    <li><a href="#tabs-2">Drink <i class="fa-solid fa-mug-hot"></i></a></li>
                </ul>

                <div id="tabs-1">

                    <div class="restaurant_content">
                        <div class="row p-3">

                            <!-- ITEM -->
                            @foreach ($product->where('category', 'food'); as $value)

                            <div class="col-md-6">
                                <div class="restaurant_item small-thumbs">

                                    <div class="img">
                                        <a href="#"><img src="assets/img/product/{{ $value->image }}" alt=""></a>
                                    </div>

                                    <div class="text">
                                        <h2><a href="#">{{ $value->name ?? "-" }}</a></h2>

                                        <p class="desc">{{ $value->description ?? "-"}}</p>

                                        <p class="price">
                                            <ins><span class="amout" >Rp. {{ number_format($value->price ??  0, 0, ',', '.')}}</span></ins>

                                        </p>
                                        <div style="display: flex; justify-content: flex-end; margin-right:-7rem;">
                                            <del><button class="btn btn-warning" style="margin-right: 0.5rem;"><i class="fa-solid fa-cart-shopping"></i></button></del>
                                            @if(auth()->user())
                                            <del><button class="btn btn-primary" style="margin-right: 0.5rem;" onclick="editItem('{{ $value->uid,}}', '{{ $value->name }}', '{{ $value->category }}', '{{ $value->price}}', '{{ $value->description }}')"><i class="fa-solid fa-pen-to-square"></i></button></del>
                                            <del><button class="btn btn-danger" type="button" onclick="deleteItem('{{ $value->uid }}', '{{ $value->name}}')"><i class="fa-solid fa-trash"></i></button></del>
                                            @endif
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- END / ITEM -->
                            @endforeach

                        </div>

                    </div>

                </div>
                <div id="tabs-2">

                    <div class="restaurant_content">
                        <div class="row p-3">

                            <!-- ITEM -->
                            @foreach ($product->where('category', 'drink'); as $value)

                            <div class="col-md-6">
                                <div class="restaurant_item small-thumbs">

                                    <div class="img">
                                        <a href="#"><img src="assets/img/product/{{ $value->image }}" alt=""></a>
                                    </div>

                                    <div class="text">
                                        <h2><a href="#">{{ $value->name ?? "-" }}</a></h2>

                                        <p class="desc">{{ $value->description ?? "-"}}</p>

                                        <p class="price">
                                            <ins><span class="amout" >Rp. {{ number_format($value->price ??  0, 0, ',', '.')}}</span></ins>

                                        </p>
                                        <div style="display: flex; justify-content: flex-end; margin-right:-7rem;">
                                            <del><button class="btn btn-warning" style="margin-right: 0.5rem;"><i class="fa-solid fa-cart-shopping"></i></button></del>
                                            @if(auth()->user())
                                            <del><button class="btn btn-primary" style="margin-right: 0.5rem;" onclick="editItem('{{ $value->uid,}}', '{{ $value->name }}', '{{ $value->category }}', '{{ $value->price}}', '{{ $value->description }}')"><i class="fa-solid fa-pen-to-square"></i></button></del>
                                            <del><button class="btn btn-danger" type="button" onclick="deleteItem('{{ $value->uid }}', '{{ $value->name}}')"><i class="fa-solid fa-trash"></i></button></del>
                                            @endif
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- END / ITEM -->
                            @endforeach

                        </div>

                    </div>

                </div>


            </div>
        </div>

    </div>
</section>
@include('restaurant.modal.add')
@include('restaurant.modal.edit')
@include('restaurant.modal.delete')



<script src="/js/restaurant/actionMenu.js"></script>
@endsection
