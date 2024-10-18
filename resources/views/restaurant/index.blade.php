@extends('partials.content')

@section('body_content')
<style>
    /* Tombol melayang */
.floating-button {
    position: fixed;
    right: 35px;
    bottom: 20px;
    border-radius: 100%;
    z-index: 1000; /* Pastikan tombol berada di atas konten lainnya */
    transition: all 0.8s ease;
    width: 85px;
    height: 85px;
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
    right: 55px;
    background-color: red;
    color: white;
    padding: 2px 6px;
    font-size: 1.75rem;
}
.btn-shop{
    margin-left: auto;
    margin-right:-60px;
    margin-top:12px;
}
  @media (max-width: 767px) {
        .btn-shop {
            margin-right: 0; /* Menghapus margin-right pada perangkat dengan lebar layar kecil */
        }
    }
</style>
<section class="section-restaurant-4 bg-white" id="restaurant">
    <div class="container">

        <div class="restaurant-tabs" style="padding: 4px" id="restaurantContent">

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
                        type="button" onclick="pesananModal()">

                    <span style="margin-left: -6px;">Check Out</span>
                        <span id="itemCount" class="badge badge-light"></span>
                    </button>
                {{-- @endif --}}
                 <ul>
                    <li><a href="#tabs-1">Breakfast</a></li>
                    <li><a href="#tabs-2">Lunch & Dinner</a></li>
                    <li><a href="#tabs-3">Coffee and Tea</a></li>
                    <li><a href="#tabs-4">Selection of Drinks</a></li>
                </ul>

                <div id="tabs-1">

                    <div class="restaurant_content">
                        <div class="row p-3">

                            <!-- ITEM -->
                        @if ($product->where('category', 'breakfast')->isEmpty())
                            <div class="col-12 text-center">
                                <p>Tidak ada data</p>
                            </div>
                        @else
                            @foreach ($product->where('category', 'breakfast') as $value)
                                 <div class="col-md-6">
                                <div class="restaurant_item small-thumbs">

                                    <div class="img">

<div class="img">
                                            <a href="#"><img src="{{ asset('assets/img/product/' . $value->image) }}" style="" alt=""></a>
                                        </div>

                                    </div>

                                     <div class="text">
                                            <h2><a href="#" style="font-weight:600">{{ $value->name ?? "-" }}</a></h2>
                                            <p class="desc" style="text-align: justify;">{{ $value->description ?? "-"}}</p>
                                            <div style="display: flex; justify-content: space-between; align-items: center;">
                                                <p class="price">
                                                    <ins><span class="amout" style="font-weight: 600">Rp. {{ number_format($value->price ?? 0, 0, ',', '.')}}</span></ins>
                                                </p>

                                                @if(auth()->guest())
                                                    <!-- Guest user: Shop button at the end -->
                                                    <button type="button" class="btn btn-warning btn-shop" style="" onclick="shopItem('{{ $value->uid }}', '{{ $value->name }}', '{{ $value->price}}', '{{ $value->image }}')">
                                                        <i class="fa-solid fa-cart-shopping"></i> Order
                                                    </button>
                                                @endif

                                                @if(auth()->user())
                                                    <!-- Logged in user: Shop button is before edit and delete -->
                                                    <div style="margin-top:13px;">
                                                        <button type="button" class="btn btn-warning" onclick="shopItem('{{ $value->uid }}', '{{ $value->name }}', '{{ $value->price}}', '{{ $value->image }}')">
                                                            <i class="fa-solid fa-cart-shopping"></i> Order
                                                        </button>
                                                        <button class="btn btn-primary" onclick="editItem('{{ $value->uid }}', '{{ $value->name }}', '{{ $value->category }}', '{{ $value->price}}', '{{ $value->description }}')">
                                                            <i class="fa-solid fa-pen-to-square"></i> Edit
                                                        </button>
                                                        <button class="btn btn-danger" type="button" onclick="deleteItem('{{ $value->uid }}', '{{ $value->name}}')">
                                                            <i class="fa-solid fa-trash"></i> Delete
                                                        </button>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>

                                </div>
                            </div>
                            @endforeach
                        @endif

                        </div>

                    </div>

                </div>
                <div id="tabs-2">

                    <div class="restaurant_content">
                        <div class="row p-3">

                            <!-- ITEM -->
                            @if ($product->where('category', 'lunch&dinner')->isEmpty())
                            <div class="col-12 text-center">
                                <p>Tidak ada data</p>
                            </div>
                        @else
                            @foreach ($product->where('category', 'lunch&dinner'); as $value)

                             <div class="col-md-6">
                                <div class="restaurant_item small-thumbs">

                                    <div class="img">

<div class="img">
                                            <a href="#"><img src="{{ asset('assets/img/product/' . $value->image) }}" style="height: 100px;" alt=""></a>
                                        </div>

                                    </div>

                                     <div class="text">
                                            <h2><a href="#" style="font-weight:600">{{ $value->name ?? "-" }}</a></h2>
                                            <p class="desc" style="text-align: justify;">{{ $value->description ?? "-"}}</p>
                                            <div style="display: flex; justify-content: space-between; align-items: center;">
                                                <p class="price">
                                                    <ins><span class="amout" style="font-weight: 600">Rp. {{ number_format($value->price ?? 0, 0, ',', '.')}}</span></ins>
                                                </p>

                                                @if(auth()->guest())
                                                    <!-- Guest user: Shop button at the end -->
                                                    <button type="button" class="btn btn-warning btn-shop" onclick="shopItem('{{ $value->uid }}', '{{ $value->name }}', '{{ $value->price}}', '{{ $value->image }}')">
                                                        <i class="fa-solid fa-cart-shopping"></i> Order
                                                    </button>
                                                @endif

                                                @if(auth()->user())
                                                    <!-- Logged in user: Shop button is before edit and delete -->
                                                    <div style="margin-top:13px;">
                                                        <button type="button" class="btn btn-warning" onclick="shopItem('{{ $value->uid }}', '{{ $value->name }}', '{{ $value->price}}', '{{ $value->image }}')">
                                                            <i class="fa-solid fa-cart-shopping"></i> Order
                                                        </button>
                                                        <button class="btn btn-primary" onclick="editItem('{{ $value->uid }}', '{{ $value->name }}', '{{ $value->category }}', '{{ $value->price}}', '{{ $value->description }}')">
                                                            <i class="fa-solid fa-pen-to-square"></i> Edit
                                                        </button>
                                                        <button class="btn btn-danger" type="button" onclick="deleteItem('{{ $value->uid }}', '{{ $value->name}}')">
                                                            <i class="fa-solid fa-trash"></i> Delete
                                                        </button>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>

                                </div>
                            </div>
                            <!-- END / ITEM -->
                            @endforeach
                            @endif
                        </div>

                    </div>

                </div>
                <div id="tabs-3">

                    <div class="restaurant_content">
                        <div class="row p-3">

                            <!-- ITEM -->
                            @if ($product->where('category', 'coffee&tea')->isEmpty())
                            <div class="col-12 text-center">
                                <p>Tidak ada data</p>
                            </div>
                        @else
                            @foreach ($product->where('category', 'coffee&tea'); as $value)

                             <div class="col-md-6">
                                <div class="restaurant_item small-thumbs">

                                    <div class="img">

<div class="img">
                                            <a href="#"><img src="{{ asset('assets/img/product/' . $value->image) }}" style="height: 100px;" alt=""></a>
                                        </div>

                                    </div>

                                     <div class="text">
                                            <h2><a href="#" style="font-weight:600">{{ $value->name ?? "-" }}</a></h2>
                                            <p class="desc" style="text-align: justify;">{{ $value->description ?? "-"}}</p>
                                            <div style="display: flex; justify-content: space-between; align-items: center;">
                                                <p class="price">
                                                    <ins><span class="amout" style="font-weight: 600">Rp. {{ number_format($value->price ?? 0, 0, ',', '.')}}</span></ins>
                                                </p>

                                                @if(auth()->guest())
                                                    <!-- Guest user: Shop button at the end -->
                                                    <button type="button" class="btn btn-warning btn-shop" onclick="shopItem('{{ $value->uid }}', '{{ $value->name }}', '{{ $value->price}}', '{{ $value->image }}')">
                                                        <i class="fa-solid fa-cart-shopping"></i> Order
                                                    </button>
                                                @endif

                                                @if(auth()->user())
                                                    <!-- Logged in user: Shop button is before edit and delete -->
                                                    <div style="margin-top:13px;">
                                                        <button type="button" class="btn btn-warning" onclick="shopItem('{{ $value->uid }}', '{{ $value->name }}', '{{ $value->price}}', '{{ $value->image }}')">
                                                            <i class="fa-solid fa-cart-shopping"></i> Order
                                                        </button>
                                                        <button class="btn btn-primary" onclick="editItem('{{ $value->uid }}', '{{ $value->name }}', '{{ $value->category }}', '{{ $value->price}}', '{{ $value->description }}')">
                                                            <i class="fa-solid fa-pen-to-square"></i> Edit
                                                        </button>
                                                        <button class="btn btn-danger" type="button" onclick="deleteItem('{{ $value->uid }}', '{{ $value->name}}')">
                                                            <i class="fa-solid fa-trash"></i> Delete
                                                        </button>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>

                                </div>
                            </div>
                            <!-- END / ITEM -->
                            @endforeach
                            @endif
                        </div>

                    </div>

                </div>
                <div id="tabs-4">

                    <div class="restaurant_content">
                        <div class="row p-3">

                            <!-- ITEM -->
                            @if ($product->where('category', 'selectionOfDrinks')->isEmpty())
                            <div class="col-12 text-center">
                                <p>Tidak ada data</p>
                            </div>
                        @else
                            @foreach ($product->where('category', 'selectionOfDrinks'); as $value)

                            <div class="col-md-6">
                                <div class="restaurant_item small-thumbs">

                                    <div class="img">

<div class="img">
                                            <a href="#"><img src="{{ asset('assets/img/product/' . $value->image) }}" style="height: 100px;" alt=""></a>
                                        </div>

                                    </div>

                                     <div class="text">
                                            <h2><a href="#" style="font-weight:600">{{ $value->name ?? "-" }}</a></h2>
                                            <p class="desc" style="text-align: justify;">{{ $value->description ?? "-"}}</p>
                                            <div style="display: flex; justify-content: space-between; align-items: center;">
                                                <p class="price">
                                                    <ins><span class="amout" style="font-weight: 600">Rp. {{ number_format($value->price ?? 0, 0, ',', '.')}}</span></ins>
                                                </p>

                                                @if(auth()->guest())
                                                    <!-- Guest user: Shop button at the end -->
                                                    <button type="button" class="btn btn-warning btn-shop" onclick="shopItem('{{ $value->uid }}', '{{ $value->name }}', '{{ $value->price}}', '{{ $value->image }}')">
                                                        <i class="fa-solid fa-cart-shopping"></i> Order
                                                    </button>
                                                @endif

                                                @if(auth()->user())
                                                    <!-- Logged in user: Shop button is before edit and delete -->
                                                    <div style="margin-top:13px;">
                                                        <button type="button" class="btn btn-warning" onclick="shopItem('{{ $value->uid }}', '{{ $value->name }}', '{{ $value->price}}', '{{ $value->image }}')">
                                                            <i class="fa-solid fa-cart-shopping"></i> Order
                                                        </button>
                                                        <button class="btn btn-primary" onclick="editItem('{{ $value->uid }}', '{{ $value->name }}', '{{ $value->category }}', '{{ $value->price}}', '{{ $value->description }}')">
                                                            <i class="fa-solid fa-pen-to-square"></i> Edit
                                                        </button>
                                                        <button class="btn btn-danger" type="button" onclick="deleteItem('{{ $value->uid }}', '{{ $value->name}}')">
                                                            <i class="fa-solid fa-trash"></i> Delete
                                                        </button>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>

                                </div>
                            </div>
                            <!-- END / ITEM -->
                            @endforeach
                            @endif
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
