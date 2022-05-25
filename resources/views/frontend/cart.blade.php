@extends('layouts.front')

@section('title')
    Cart
@endsection

@section('content')
    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h6 class="mb-0">
                <a href="{{url('/')}}">
                    Accueil
                </a> /
                <a href="{{url('cart')}}">
                    Cart
                </a>
            </h6>
        </div>
    </div>
    <div class="container my-5">
        <div class="card shadow product_data">
            <div class="card-body">
                @php $total = 0; @endphp
                @foreach($cartitems as $item)
                <div class="row">
                    <div class="col md-2">
                        <img src="{{ asset('asserts/uploads/products/'.$item->products->image) }}" height="70px" width="70px" alt="prduct image">
                    </div>
                    <div class="col md-5">
                        <h3>{{ $item->products->name }}</h3>
                    </div>
                    <div class="col-md-3">
                        <input type="hidden" class="prod_id" value="{{ $item->prod_id }}">
                        <label for="Quantity">Quantity</label>
                        <div class="input-group text-center mb-3" style="width:130px">
                            <button class="input-group-text changeQuantity decrement-btn">-</button>
                            <input type="text" name="quantity" class="form-control qty-input text-center" value="{{ $item->prod_qty }}">
                            <button class="input-group-text changeQuantity increment-btn">+</button>
                        </div>
                    </div>
                    <div class="col md-2">
                        <button class="btn btn-danger delete-cart-item"><i class="fa fa-trash"></i> Supprimer</button>
                    </div>
                </div>
                    @php $total += $item->products->selling_price * $item->prod_qty; @endphp
                @endforeach
            </div>
            <div class="card-footer">
                <h6>
                    Total price : {{ $total }}
                </h6>
                <button class="btn btn-outline-success float-end">Proceed to checkout</button>
            </div>
        </div>

    </div>


@endsection
