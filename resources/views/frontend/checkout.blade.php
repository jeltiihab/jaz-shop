@extends('layouts.front')

@section('title')
    Checkout
@endsection

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-body">
                        <h6>Basic Details</h6>
                        <hr>
                        <div class="row checkout-form">
                            <div class="col-md-6 mt-3">
                                <label for="firstName">Prénom</label>
                                <input type="text" class="form-control" placeholder="Prénom">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="firstName">Nom</label>
                                <input type="text" class="form-control" placeholder="Nom">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="firstName">Email</label>
                                <input type="text" class="form-control" placeholder="Email">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="firstName">Telephone</label>
                                <input type="text" class="form-control" placeholder="Telephone">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="firstName">Adresse 1</label>
                                <input type="text" class="form-control" placeholder="Adresse 1">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="firstName">Adresse 2</label>
                                <input type="text" class="form-control" placeholder="Adresse 2">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="firstName">Ville</label>
                                <input type="text" class="form-control" placeholder="Ville">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="firstName">Region</label>
                                <input type="text" class="form-control" placeholder="Region">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="firstName">Pays</label>
                                <input type="text" class="form-control" placeholder="Pays">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="firstName">Code postal</label>
                                <input type="text" class="form-control" placeholder="Code postal">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
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
                        <button class="btn btn-primary float-end">Place order</button>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
