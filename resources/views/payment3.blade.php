{{-- @extends('layouts.app') --}}

{{-- @section('content') --}}
<html>
	<head>
        <title>Paystack Inline</title>
        <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>

		<!-- Paystack Library is ready to fly -->
		<script src='https://js.paystack.co/v1/inline.js'></script>
    </head>
    
<style type="text/css">
    input, button {
        margin: 2px;
        padding: 10px;
    }
    button {
        background-color: blue;
        color: white;
        border: 0px
        cursor: pointer;
    }

    d-none {
        display: none;
    }
</style>

<body>
    <div></div>
    <a href="" id="getData" class="data d-none" type="button">Make Payment</a>
</body>
{{-- @endsection --}}

<script type="text/javascript">

// get customer data

$('#getData').click((e) => {
    e.preventDefault()
    $('#getdata').addClass('d-none')
    $('.data').append(`<form id="payment">
    <input type="text" id="name" placeholder="Name">
    <input type="email" id="email" placeholder="Email">
    <input type="text" id="amount" placeholder="Amount">
    <button type="submit" onclick="makepayment()">Continue To make Payment</button>
    </form>`)
});

    function makepayment(key, email, amount, name, ref) {
        var handler = PaystackPop.setup({
            key: 'pk_test_06401980fb470fb0ccd971004c1d114515ed6b69', // This is your public key only! 
            name: $('#name').val(),
            email: $('#email').val(), // Customers email
            amount: $('#amount').val(), // The amount charged, I like big money lol
            ref: Math.floor((Math.random() * 999999999)), // Generate a random reference number and put here",
            metadata: { // More custom information about the transaction
             custom_fields: [
                {}
             ]
            },
            callback: function(response){
              let div = document.getElementsByTagName("div")[0] 
              div.innerHTML = "Please keep this number for reference purpose</br />" + response.reference;
            },
            onClose: function(){
              alert('window closed');
            }
        });
        // Payment Request Just Fired  
        handler.openIframe(); 
    }
    let dom = document.getElementsByTagName("button")[0];
    dom.addEventListener("click", function() {
        makepayment() // edit this and input your public key .. This is mine, please pay in ony big money lol
    });

</script>
</html>