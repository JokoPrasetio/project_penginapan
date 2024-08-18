@extends('partials.content')

@section('body_content')
<style>
    /* Tombol melayang */
.floating-button {
    position: fixed;
    right: 20px;
    bottom: 20px;
    border-radius: 100%;
    z-index: 1000; /* Pastikan tombol berada di atas konten lainnya */
    transition: all 0.8s ease;
    width: 70px;
    height: 70px;
    }

/* Efek berputar */
@keyframes float {
    0% { transform: translateY(0); }
    50% { transform: translateY(-10px); }
    100% { transform: translateY(0); }
}
.floating-button:hover {
    animation: float 2s ease-in-out infinite;
}
#itemCount {
    position: absolute;
    top: -1px;
    right: 45px;
    background-color: red;
    color: white;
    padding: 2px 6px;
    font-size: 1.75rem;
}
</style>
<section class="section-restaurant-4 bg-white" id="restaurant">
    <div class="container">

        <div class="restaurant-tabs" style="padding: 4px">

            <div class="tabs tabs-restaurant">


                <div class="icon-restaurant text-center">
                    <i class="lotus-icon-cooker-hood"></i>
                    @if(auth()->user())
                    <div style="display: flex; justify-content: flex-end; margin-bottom:3rem;">
                        <button type="button" class="btn btn-primary" style="font-size: 1.3rem; margin-right: 12px;" data-toggle="modal" data-target="#myModal">Add Item</button>
                    </div>
                    @endif
                    @include('partials.alert')
                </div>
                {{-- @if(!auth()->user()) --}}
                    <button
                        class="btn btn-success floating-button" id="floating-button"
                        type="button" onclick="pesananModal()" style="display: none">
                        <p style="margin-top: 10px;">Pesan</p>
                        <span id="itemCount" class="badge badge-light"></span>
                    </button>
                {{-- @endif --}}
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
                                        <a href="#"><img src="assets/img/product/{{ $value->image }}" style="width: 400px;" alt=""></a>
                                    </div>

                                    <div class="text">
                                        <h2><a href="#">{{ $value->name ?? "-" }}</a></h2>

                                        <p class="desc">{{ $value->description ?? "-"}}</p>

                                        <p class="price">
                                            <ins><span class="amout"  style="font-weight: 500">Rp. {{ number_format($value->price ??  0, 0, ',', '.')}}</span></ins>
                                        </p>
                                        <div style="margin-top: 1rem;">
                                        <div style="display: flex; justify-content: flex-end; margin-right:-0.4rem;">
                                            <div id="amount-{{ $value->uid }}" style="display: none; flex-direction: row;">
                                                <button type="button" class="btn btn-danger btn-sm mr-2" id="decreaseQtys-{{ $value->uid }}">-</button>
                                                <span class="quantity-display ms-2 me-2 fw-semibold" id="produkPesananJumlah-{{ $value->uid }}" style="margin:5px;"></span>
                                                <button type="button" class="btn btn-success btn-sm ml-2" id="increaseQty-{{ $value->uid }}" style="margin-right: 1rem;" >+</button>
                                             </div>
                                            <del><button type="button" class="btn btn-warning" style="margin-right: 0.5rem;" onclick="shopItem('{{ $value->uid }}' , '{{ $value->name }}', '{{ $value->price}}', '{{ $value->image }}')"><i class="fa-solid fa-cart-shopping"></i></button></del>
                                            @if(auth()->user())
                                            <del><button class="btn btn-primary" style="margin-right: 0.5rem;" onclick="editItem('{{ $value->uid}}', '{{ $value->name }}', '{{ $value->category }}', '{{ $value->price}}', '{{ $value->description }}')"><i class="fa-solid fa-pen-to-square"></i></button></del>
                                            <del><button class="btn btn-danger" type="button" onclick="deleteItem('{{ $value->uid }}', '{{ $value->name}}')"><i class="fa-solid fa-trash"></i></button></del>
                                            @endif
                                        </div>
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
                                        <a href="#"><img src="assets/img/product/{{ $value->image }}" style="width: 400px;" alt=""></a>
                                    </div>

                                    <div class="text">
                                        <h2><a href="#">{{ $value->name ?? "-" }}</a></h2>

                                        <p class="desc">{{ $value->description ?? "-"}}</p>

                                        <p class="price">
                                            <ins><span class="amout"  style="font-weight: 500">Rp. {{ number_format($value->price ??  0, 0, ',', '.')}}</span></ins>
                                        </p>
                                        <div style="margin-top: 1rem;">
                                        <div style="display: flex; justify-content: flex-end; margin-right:-3rem;">
                                            <div id="amount-{{ $value->uid }}" style="display: none; flex-direction: row;">
                                                <button type="button" class="btn btn-danger btn-sm mr-2" id="decreaseQtys-{{ $value->uid }}">-</button>
                                                <span class="quantity-display ms-2 me-2 fw-semibold" id="produkPesananJumlah-{{ $value->uid }}" style="margin:5px;"></span>
                                                <button type="button" class="btn btn-success btn-sm ml-2" id="increaseQty-{{ $value->uid }}" style="margin-right: 1rem;" >+</button>
                                             </div>
                                            <del><button type="button" class="btn btn-warning" style="margin-right: 0.5rem;" onclick="shopItem('{{ $value->uid }}' , '{{ $value->name }}', '{{ $value->price}}', '{{ $value->image }}')"><i class="fa-solid fa-cart-shopping"></i></button></del>
                                            @if(auth()->user())
                                            <del><button class="btn btn-primary" style="margin-right: 0.5rem;" onclick="editItem('{{ $value->uid}}', '{{ $value->name }}', '{{ $value->category }}', '{{ $value->price}}', '{{ $value->description }}')"><i class="fa-solid fa-pen-to-square"></i></button></del>
                                            <del><button class="btn btn-danger" type="button" onclick="deleteItem('{{ $value->uid }}', '{{ $value->name}}')"><i class="fa-solid fa-trash"></i></button></del>
                                            @endif
                                        </div>
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
@include('restaurant.modal.pesan')



<script src="/js/restaurant/actionMenu.js"></script>
@endsection
