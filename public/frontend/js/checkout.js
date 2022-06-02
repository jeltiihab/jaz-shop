$(document).ready(function(){
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
    $('.razorpay_btn').click(function(e){
        e.preventDefault();
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

        if(!firstname)
        { 
            fname_error = "Ce champs est obligatoire";
            $('#fname_error').html('')
            $('#fname_error').html(fname_error)
        }else{
             fname_error = "";
            $('#fname_error').html('')
        }
        if(!lastname)
        {
            lname_error = "Ce champs est obligatoire";
            $('#lname_error').html('')
            $('#lname_error').html(lname_error)
        }else{
            lname_error = "";
            $('#lname_error').html('')
        }
        if(!email)
        {
            email_error = "Ce champs est obligatoire";
            $('#email_error').html('')
            $('#email_error').html(email_error)
        }else{
            email_error = "";
            $('#email_error').html('')
        }
        if(!phone)
        {
            phone_error = "Ce champs est obligatoire";
            $('#phone_error').html('')
            $('#phone_error').html(phone_error)
        }else{
            phone_error = "";
            $('#phone_error').html('')
        }
        if(!address1)
        {
            address1_error = "Ce champs est obligatoire";
            $('#adress_error').html('')
            $('#adress_error').html(address1_error)
        }else{
            address1_error = "";
            $('#adress_error').html('')
        }
        if(!city)
        {
            city_error = "Ce champs est obligatoire";
            $('#city_error').html('')
            $('#city_error').html(city_error)
        }else{
            city_error = "";
            $('#city_error').html('')
        }
        if(!state)
        {
            state_error = "Ce champs est obligatoire";
            $('#state_error').html('')
            $('#state_error').html(state_error)
        }else{
            state_error = "";
            $('#state_error').html('')
        }
        if(!country)
        {
            country_error = "Ce champs est obligatoire";
            $('#country_error').html('')
            $('#country_error').html(country_error)
        }else{
            country_error = "";
            $('#country_error').html('')
        }
        if(!postalcode)
        {
            postalcode_error = "Ce champs est obligatoire";
            $('#postalcode_error').html('')
            $('#postalcode_error').html(postalcode_error)
        }else{
            postalcode_error = "";
            $('#postalcode_error').html('')        
        }
        if(fname_error != '' || lname_error != ''|| phone_error != ''|| email_error != ''|| address1_error != ''|| city_error != ''|| state_error != ''|| country_error != ''|| postalcode_error != '')
        {
            return false;
        }else{
            const data = {
                'firstname' : firstname,
                'lastname' : lastname,
                'email' : email,
                'phone' : phone,
                'address1' : address1,
                'address2' : address2,
                'city' : city,
                'state' : state,
                'country' : country,
                'postalcode' : postalcode, 
            }

            $.ajax({
                method: "POST",
                url: "/proceed-to-pay",
                data: data,
                success: function(response){
                   // alert(response.total_price)
                   var options = {
                        "key": "rzp_test_6oaP1gOnixbqJJ", // Enter the Key ID generated from the Dashboard
                        "amount": response.total_price*100, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
                        "currency": "INR",
                        "name": response.firstname+''+response.lastname,
                        "description": "Thank you for choosing us!",
                        "image": "https://example.com/your_logo",
                        //"order_id": "order_9A33XWu170gUtm", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
                        "handler": function (responsea){
                            //alert(responsea.razorpay_payment_id);
                            $.ajax({
                                method: "POST",
                                url: "/place-order",
                                data: {
                                    'fname' : response.firstname,
                                    'lname' : response.lastname,
                                    'email' : response.email,
                                    'phone' : response.phone,
                                    'address1' : response.address1,
                                    'city' : response.city,
                                    'state' : response.state,
                                    'country' : response.country,
                                    'postalcode' : response.postalcode,
                                    'payment_mode' : "Paid by Razorpay",
                                    'payment_id' : responsea.razorpay_payment_id

                                },
                                success: function(responseb){
                                    //alert(responseb.status);
                                    SVGFEDropShadowElement(responseb.status);
                                    window.location.href="/my-orders";
                                }
                            });
                        },
                        "prefill": {
                            "name":  response.firstname+' '+response.lastname,
                            "email":  response.email,
                            "contact": response.phone
                        },
                        "theme": {
                            "color": "#3399cc"
                        }  
                    };
                    var rzp1 = new Razorpay(options);
                    rzp1.open();                    
                }
            })
        }
    }) 
}) 