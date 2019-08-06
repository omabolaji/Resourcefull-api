
<script>
function makepayment(key, email, amount, ref, callback) {
	var handler = PaystackPop.setup({
		key: key, // This is your public key only! 
		email: email || 'customer@email.com', // Customers email
		amount: amount || 5000000.00, // The amount charged, I like big money lol
		ref: ref || 6019, // Generate a random reference number and put here",
		metadata: { // More custom information about the transaction
		 custom_fields: [
			{}
		 ]
		},
		callback: callback || function(response){
		  let div = document.getElementsByTagName("div")[0] 
		  div.innerHTML = "This was the json response reference </br />" + response.reference;
		},
		onClose: function(){
		  alert('window closed');
		}
	});
	// Payment Request Just Fired  
	handler.openIframe(); 
    </script>