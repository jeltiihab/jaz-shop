@extends('layouts.front')

@section('title')
    Welcome to JAZ-shop
@endsection

@section('content')
    @include('layouts.incs.slider')

    <div class="py-5">
        <div class="container">
            <div class="row">
                <h2>Liste des produits</h2>
                <div class=" featured-carousel owl-carousel owl-theme">
                    @foreach($featured_products as $prod)
                        <div class="item">
                            <div class="card">
                                <img src="{{asset('asserts/uploads/products/'.$prod->image)}}" alt="Product-image">
                                <div class="card-body">
                                    <h5>{{$prod->name}}</h5>
                                    <span class="float-start">{{$prod->selling_price}}</span>
                                    <span class="float-end"><s>{{$prod->original_price}}</s></span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div> 
            </div>
        </div>
    </div>

    <div class="py-5">
        <div class="container">
            <div class="row">
                <h2>Tendances</h2>
                <div class=" featured-carousel owl-carousel owl-theme">
                    @foreach($featured_categories as $cate)
                        <div class="item">
                            <a href="{{url('view-category/'.$cate->slug)}}"> 
                                <div class="card">
                                    <img src="{{asset('asserts/uploads/category/'.$cate->image)}}" alt="Product-image">
                                    <div class="card-body">
                                        <h5>{{$cate->name}}</h5>
                                        <p>{{$cate->description}}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div> 
            </div>
        </div>
    </div>
@endsection

@section('scripts')
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