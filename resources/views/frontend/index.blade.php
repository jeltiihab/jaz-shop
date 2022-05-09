@extends('layouts.front')

@section('title')
    Welcome to JAZ-shop
@endsection

@section('content')
    @include('layouts.incs.slider')

    <div class="py-5">
        <div class="container">
            <div class="row">
                <h2>jsnbkf</h2>
                <div class=" featured-carousel owl-carousel owl-theme">
                    @foreach($featured_products as $prod)
                        <div class="item">
                            <div class="card">
                                <img src="{{asset('asserts/uploads/products/'.$prod->image)}}" alt="Product-image">
                                <div class="card-body">
                                    <span>{{$prod->name}}</span>
                                    <span>{{$prod->selling_price}}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div> 
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $('.featured-carousel').owlCarousel({
        
        margin:10,
        nav:true,
        dots:false,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:4
            }
        }
        })  
    </script>
@endsection