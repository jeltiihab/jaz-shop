@extends('layouts.front')

@section('title')
    Checkout
@endsection
@php $total = 0 @endphp
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
                                    <input type="text" name="fname" value="{{ Auth::user()->name }}" class="form-control firstname" placeholder="Prénom">
                                    <span id="fname_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="lname">Nom</label>
                                    <input type="text" name="lname" value="{{ Auth::user()->lname }}" class="form-control lastname" placeholder="Nom">
                                    <span id="lname_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="email">Email</label>
                                    <input type="text" name="email" value="{{ Auth::user()->email }}" class="form-control email" placeholder="Email">
                                    <span id="email_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="phone">Telephone</label>
                                    <input type="text" name="phone" value="{{ Auth::user()->phone }}" class="form-control phone" placeholder="Telephone">
                                    <span id="phone_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="address1">Adresse 1</label>
                                    <input type="text" name="address1" value="{{ Auth::user()->address1 }}" class="form-control address1" placeholder="Adresse 1">
                                    <span id="adress_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="address2">Adresse 2</label>
                                    <input type="text" name="address2" value="{{ Auth::user()->address2 }}" class="form-control address2" placeholder="Adresse 2">
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="city">Ville</label>
                                    <input type="text" name="city" value="{{ Auth::user()->city }}" class="form-control city" placeholder="Ville">
                                    <span id="city_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="state">Region</label>
                                    <input type="text" name="state" value="{{ Auth::user()->state }}" class="form-control state" placeholder="Region">
                                    <span id="state_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="country">Pays</label>
                                    <input type="text" name="country" value="{{ Auth::user()->country }}" class="form-control country" placeholder="Pays">
                                    <span id="country_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="postalcode">Code postal</label>
                                    <input type="text" name="postalcode" value="{{ Auth::user()->postalcode }}" class="form-control postalcode" placeholder="Code postal">
                                    <span id="postalcode_error" class="text-danger"></span>
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
                                    <td>Nom</td>
                                    <td>Quantité</td>
                                    <td>Prix</td>
                                    </thead>
                                    <tbody>
                                    @foreach ($cartitems as $item)
                                        <tr>
                                            <td>{{ $item->products->name }}</td>
                                            <td>{{ $item->prod_qty }}</td>
                                            <td>{{ $item->products->selling_price }}</td>
                                        </tr>
                                        @php $total += $item->products->selling_price * $item->prod_qty @endphp
                                    @endforeach
                                    </tbody>
                                </table>
                                <h6 class="px-2">Total <span class="float-end">{{$total}}</span></h6>
                                <hr>
                                <input type="hidden" name="payment_mode" value="COD">
                                <button type="submit" class="btn btn-success w-100">Place order | COD</button>
                                <button type="button" class="btn btn-primary w-100 mt-3 razorpay_btn">Pay with Razorpay</button>
                                <div id="paypal-button-container"></div>

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
@section('scripts')
    <script src="https://www.paypal.com/sdk/js?client-id=AU1VOi7MjRlWasHFHGPo-lzXJuMdMrhWpe5uZCDuk74g276xKi1TEdwZFdzFZEjwON5ScZwdQ-ZSJPFF"></script>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
     <script>
      paypal.Buttons({
        // Sets up the transaction when a payment button is clicked
        createOrder: (data, actions) => {
          return actions.order.create({
            purchase_units: [{
              amount: {
                value: '{{ $total }}' // Can also reference a variable or function
              }
            }]
          });
        },
        // Finalize the transaction after payer approval
        onApprove: (data, actions) => {
          return actions.order.capture().then(function(details) {
            alert('Transaction completed by ' + details.payer.name.given_name);
            
            let firstname = $('.firstname').val();
            let lastname = $('.lastname').val();
            let email = $('.email').val();
            let phone = $('.phone').val();
            let address1 = $('.address1').val();
            let address2 = $('.address2').val();
            let city = $('.city').val();
            let state = $('.state').val();
            let country = $('.country').val();
            let postalcode = $('.postalcode').val();

            console.log(lastname);
            $.ajax({
                method: "POST",
                url: "/place-order",
                data: {
                    'fname' : firstname,
                    'lname' : lastname,
                    'email' : email,
                    'phone' : phone,
                    'address1' : address1,
                    'city' : city,
                    'state' : state,
                    'country' : country,
                    'postalcode' : postalcode,
                    'payment_mode' : "Paid by paypal",
                    'payment_id' :  details.id,

                },
                success: function(response){
                    //alert(responseb.status);
                    SVGFEDropShadowElement(response.status);
                    window.location.href="/my-orders";
                }
            });
           
           
           
           
            // When ready to go live, remove the alert and show a success message within this page. For example:
            // const element = document.getElementById('paypal-button-container');
            // element.innerHTML = '<h3>Thank you for your payment!</h3>';
            // Or go to another URL:  actions.redirect('thank_you.html');
          });
        }
      }).render('#paypal-button-container');
    </script>
@endsection
