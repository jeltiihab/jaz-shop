@extends('layouts.front')

@section('title',$product->name)

@section('content')
    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h6 class="mb-0">
                <a href="{{url('category')}}">
                    Collections
                </a> /
                <a href="{{url('category/'.$product->category->slug)}}">
                    {{$product->category->name}}
                </a>
                <a href="{{url('category/'.$product->category->slug)."/".$product->slug}}">
                    {{$product->name}}
                </a>
            </h6>
        </div>
    </div>

    <div class="container">
        <div class="card shadow product_data">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 border-right">
                        <img src="{{asset('asserts/uploads/products/'.$product->image)}}" class="w-100" alt="">
                    </div>
                    <div class="col-md-8">
                        <h2 class="mb-0">
                            {{$product->name}}
                            <label style="font-size: 16px;"
                                   class="float-end badge bg-danger trending_tag">{{$product->trending == 1 ? 'Tendance':''}}</label>
                        </h2>
                        <hr>
                        <label class="me-3">Prix original : <s>{{$product->original_price}} $</s></label>
                        <label class="fw-bold">Solde : {{$product->selling_price}} $</label>
                        <p class="mt-3">
                            {!! $product->small_description!!}
                        </p>
                        @if ($product->qty>0)
                            <label class="badge bg-success">Disponible</label>
                        @else
                            <label class="badge bg-danger">Rupture</label>
                        @endif
                        <div class="row mt-2">
                            <input type="hidden" value={{ $product->id }} class="prod_id">
                            <div class="col-md-2">
                                <label for="Quantity">Quantité</label>
                                <div class="input-group text-center mb-3">
                                    <button type="button" class="input-group-text decrement-btn">-</button>
                                    <input type="text" name="Quantity " value="1" class="form-control qty-input">
                                    <button class="input-group-text increment-btn">+</button>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <br/>
                                @if ($product->qty>0)
                                    <label class="badge bg-success">Disponible</label>
                                    <button type="button" class="btn btn-primary me-3 addToCartBtn float-start">Ajouter au
                                        panier <i
                                            class="fa fa-shopping-cart"></i></button>
                                @else
                                    <label class="badge bg-danger">Rupture</label>
                                @endif
                                <button type="button" class="btn btn-success me-3 float-start">Ajouter aux favoris <i
                                        class="fa fa-heart"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
