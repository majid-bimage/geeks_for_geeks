<?php foreach($work_details as $work){
    $work_details=$work;
} ?>
<div class="container">

<div class="container-fluid">

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
                    data: { amount: amount },
                    success: function(response) {
                        // Display the response from the server
                        $("#order-response").html(response);
                    },
                    error: function (xhr, status, error) {
                    // Handle any errors that occur
                    console.error(xhr, status, error);
                }
                });
            
        });
    }
</script>
</html>