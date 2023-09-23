<?php foreach($work_details as $work){
    $work_details=$work;
} ?>
<div class="container">

<div class="container-fluid">
    <input type="hidden" value="<?php echo $this->session->userdata('user_id'); ?>" id="user_id">
<div class="row">
    <div class="col-sm-6">
        <h2>Work Details</h2>

        <h3>Work Title:</h3>
        <p><?php echo $work_details->work_title; ?></p>

        <h3>Description:</h3>
        <p><?php echo $work_details->description; ?></p>

        <h3>Bids Received:</h3>
        <ul class="list-group ">
        <?php foreach ($bids_received as $bid): ?>
            <li class="list-group-item">
                <strong>Bid Amount (RS /-):</strong> <?php echo $bid->bid_amount; ?><br>
                <strong>Proposal:</strong> <?php echo $bid->proposal; ?><br>
                <strong>Status:</strong> <?php 
                    switch($bid->status){
                        case 1 :
                            echo "Bid Accepted!";
                            break;
                        case 0 :
                            echo "Pending!";
                            break;
                        case 2 :
                            echo "Rejected!";
                            break;
                    }
                 ?>

                 <br>
                 <strong>Freelancer :</strong> <?php echo $bid->first_name.$bid->last_name; ?><br>
                 <strong>Phone Number :</strong> <?php echo $bid->phone_number; ?><br>


                <!-- Display other bid details here -->
                <a href="tel:<?php echo $bid->phone_number; ?>">Call Developer</a>
                <?php if($bid->status == 0){ ?>
                <br>
                <!-- <button class="btn" onClick="showBidForm(<?php echo $bid->id ?>)">Accept</button> -->

                <a href="<?php echo base_url()."accept_bid/".$bid->id; ?>">Accept</a>
                <button class="btn btn-secondary m-3" onClick="makeorderid(<?php echo $bid->id.",".$bid->bid_amount; ?>)">Pay</button>
                    <br>
                    <p id='order-response'>

                    </p>
                <br>
                <button class="btn" onClick="showBidForm(<?php echo $bid->id ?>)">Reject</button>
                <form id="<?php echo "bidForm_".$bid->id ?>" action="" style="display:none">
                    <input type="text">
                </form>
                <?php } ?>
                
            </li>
        <?php endforeach; ?>
        </ul>

        <!-- Add a button or link to go back to the works list or any other relevant page -->

    </div>
</div>

</div>

</div>

</body>
<script>
    function showBidForm(workId) {
        // Show the bid form for the specified work
        var bidForm = document.getElementById('bidForm_' + workId);
        if (bidForm.style.display === 'none') {
            bidForm.style.display = 'block';
        } else {
            bidForm.style.display = 'none';
        }
    }
    function makeorderid(bid, amount){
        $(document).ready(function() {
            // AJAX request when the "Create Order" button is clicked
          
                // Get the amount from the input field
                // var amount = $("#amount").val();
                
                // Make an AJAX POST request to create an order
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('index.php/PaymentController/createRazorpayOrder'); ?>",
                    data: { 'amount': amount*100 ,
                        'bid':bid},
                    dataType: "json", 
                    success: function(response) {
                        // Display the response from the server
                        console.log(response);
                        $("#order-response").html(response);
                        if (response.id) {
                            // Redirect the user to the Razorpay payment page
                            // var order_id = response.id;
                            // var razorpay_payment_url = 'https://api.razorpay.com/v1/checkout/embedded';
                            // var redirect_url = razorpay_payment_url + '/' + order_id;
                            // window.location.href = redirect_url;
                            
                            pay(response.id,amount,bid);
                        } else {
                            // Handle errors or display a message to the user
                            $("#order-response").html('Error: ' + response.error);
                        }
                    },
                    error: function (xhr, status, error) {
                    // Handle any errors that occur
                    console.error(xhr, status, error);
                }
                });
            
        });
    }
</script>
<button id="rzp-button1">Pay</button>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
    function pay(order_id,amount,bid){
var options = {
    "key": "rzp_test_iUQcWB2aQqJXPM", // Enter the Key ID generated from the Dashboard
    "amount": amount*100, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
    "currency": "INR",
    "name": "Acme Corp", //your business name
    "description": "Test Transaction",
    "image": "https://example.com/your_logo",
    "order_id": order_id, //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
    "handler": function (response){
        // alert(response.razorpay_payment_id);
        // alert(response.razorpay_order_id);
        // alert(response.razorpay_signature);
        var payment_method = null;
        
        var customer_id = "<?php  echo $this->session->userdata('user_id'); ?>";
        var customer_name = "<?php  echo $this->session->userdata('username'); ?>";
        var customer_email = "<?php  echo $this->session->userdata('email'); ?>";


        insertToPaymentTable(response.razorpay_order_id, amount,customer_id,bid,customer_name,customer_email,response.razorpay_payment_id,payment_method,response.razorpay_signature);
    },
    "prefill": { //We recommend using the prefill parameter to auto-fill customer's contact information, especially their phone number
        "name": "Gaurav Kumar", //your customer's name
        "email": "gaurav.kumar@example.com", 
        "contact": "9000090000"  //Provide the customer's phone number for better conversion rates 
    },
    "notes": {
        "address": "Razorpay Corporate Office"
    },
    "theme": {
        "color": "#3399cc"
    }
};
var rzp1 = new Razorpay(options);
rzp1.on('payment.failed', function (response){
        alert(response.error.code);
        alert(response.error.description);
        alert(response.error.source);
        alert(response.error.step);
        alert(response.error.reason);
        alert(response.error.metadata.order_id);
        alert(response.error.metadata.payment_id);
});
// document.getElementById('rzp-button1').onclick = function(e){
    rzp1.open();
    preventDefault();
// }
    }


    function insertToPaymentTable(order_id, amount,customer_id,bid,customer_name,customer_email,transaction_id,payment_method,additional_info){
        var paymentData = {
        order_id: order_id,
        amount: amount, // Replace with the actual amount
        customer_id:customer_id,
        bid:bid,
        currency: 'INR', // Replace with the actual currency
        payment_status: 'completed', // Replace with the actual payment status
        customer_name: customer_name, // Replace with the customer's name
        customer_email: customer_email, // Replace with the customer's email
        transaction_id: transaction_id, // Replace with the actual transaction ID
        payment_method: 'credit card', // Replace with the payment method
        additional_info: 'Additional payment info' // Replace with additional information
    };

    $.ajax({
        type: "POST",
        url: "<?php echo base_url('index.php/PaymentController/insert_payment_data'); ?>", // Replace with the correct URL
        data: JSON.stringify(paymentData),
        contentType: "application/json; charset=utf-8",
        dataType: "json",
        success: function(response) {
            console.log(response); // Handle the server response
            if(response){
                window.location.href="<?php echo base_url('index.php/CustomerRegistration/accept_bid/'); ?>"+bid;

            }
        },
        error: function(error) {
            console.error("Error:", error);
        }
    });
    }
</script>
</html>