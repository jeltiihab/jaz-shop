@extends('layouts.front')

@section('title')
    Checkout
@endsection

@section('content')
    <div class="container mt-3">
        <form action="{{ url('place-order') }}" method="POST">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-body">
                            <h6>Basic Details</h6>
                            <hr>
                            <div class="row checkout-form">
                                <div class="col-md-6 mt-3">
                                    <label for="fname">Prénom</label>
                                    <input type="text" name="fname" value="{{ Auth::user()->name }}" class="form-control" placeholder="Prénom">
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="lname">Nom</label>
                                    <input type="text" name="lname" value="{{ Auth::user()->lname }}" class="form-control" placeholder="Nom">
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="email">Email</label>
                                    <input type="text" name="email" value="{{ Auth::user()->email }}" class="form-control" placeholder="Email">
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="phone">Telephone</label>
                                    <input type="text" name="phone" value="{{ Auth::user()->phone }}" class="form-control" placeholder="Telephone">
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="address1">Adresse 1</label>
                                    <input type="text" name="address1" value="{{ Auth::user()->address1 }}" class="form-control" placeholder="Adresse 1">
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="address2">Adresse 2</label>
                                    <input type="text" name="address2" value="{{ Auth::user()->address2 }}" class="form-control" placeholder="Adresse 2">
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="city">Ville</label>
                                    <input type="text" name="city" value="{{ Auth::user()->city }}" class="form-control" placeholder="Ville">
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="state">Region</label>
                                    <input type="text" name="state" value="{{ Auth::user()->state }}" class="form-control" placeholder="Region">
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="country">Pays</label>
                                    <input type="text" name="country" value="{{ Auth::user()->country }}" class="form-control" placeholder="Pays">
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="postalcode">Code postal</label>
                                    <input type="text" name="postalcode" value="{{ Auth::user()->postalcode }}" class="form-control" placeholder="Code postal">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body">
                            @if($cartitems->count() > 0)
                                <h6>Other Details</h6>
                                <hr>
                                <table class="table table-striped table-bordered">
                                    <thead>
                                    <tr>Nom</tr>
                                    <tr>Quantité</tr>
                                    <tr>Prix</tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($cartitems as $item)
                                        <tr>
                                            <td>{{ $item->products->name }}</td>
                                            <td>{{ $item->prod_qty }}</td>
                                            <td>{{ $item->products->selling_price }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <hr>
                                <button type="submit" class="btn btn-primary w-100">Place order</button>
                            @else
                                <h6>Other Details</h6>
                                <hr>
                                <h3 class="text-center">No products in your cart</h3>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
