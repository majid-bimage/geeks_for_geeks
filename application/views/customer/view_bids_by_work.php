<?php foreach($work_details as $work){
    $work_details=$work;
} ?>
    <!-- End Navbar -->
    <div class="container-fluid px-2 px-md-4">
      <div class="page-header min-height-300 border-radius-xl mt-4" style="background-image: url('https://images.unsplash.com/photo-1531512073830-ba890ca4eba2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80');">
        <span class="mask  bg-gradient-primary  opacity-6"></span>
      </div>
      <div class="card card-body mx-3 mx-md-4 mt-n6">
        <div class="row gx-4 mb-2">
          <!-- <div class="col-auto">
            <div class="avatar avatar-xl position-relative">
              <img src="<?php echo base_url()."assets/admin/"; ?>/assets/img/bruce-mars.jpg" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
            </div>
          </div>
          <div class="col-auto my-auto">
            <div class="h-100">
              <h5 class="mb-1">
                Richard Davis
              </h5>
              <p class="mb-0 font-weight-normal text-sm">
                CEO / Co-Founder
              </p>
            </div>
          </div> -->
          <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
            <!-- <div class="nav-wrapper position-relative end-0">
              <ul class="nav nav-pills nav-fill p-1" role="tablist">
                <li class="nav-item">
                  <a class="nav-link mb-0 px-0 py-1 active " data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="true">
                    <i class="material-icons text-lg position-relative">home</i>
                    <span class="ms-1">App</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link mb-0 px-0 py-1 " data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="false">
                    <i class="material-icons text-lg position-relative">email</i>
                    <span class="ms-1">Messages</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link mb-0 px-0 py-1 " data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="false">
                    <i class="material-icons text-lg position-relative">settings</i>
                    <span class="ms-1">Settings</span>
                  </a>
                </li>
              </ul>
            </div> -->
          </div>
        </div>
        <div class="row">
          <div class="row">
            <div class="col-12 col-xl-4">
              <div class="card card-plain ">
                <div class="card-header pb-0 p-3">
                  <h6 class="mb-0">Project Title</h6>
                </div>
                <div class="card-body p-3">
                <h6 class="text-uppercase text-body text-xs font-weight-bolder"><?php echo $work_details->work_title; ?></h6>

                <!-- 
                  <ul class="list-group">
                    <li class="list-group-item border-0 px-0">
                      <div class="form-check form-switch ps-0">
                        <input class="form-check-input ms-auto" type="checkbox" id="flexSwitchCheckDefault" checked>
                        <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0" for="flexSwitchCheckDefault">Email me when someone follows me</label>
                      </div>
                    </li>
                    <li class="list-group-item border-0 px-0">
                      <div class="form-check form-switch ps-0">
                        <input class="form-check-input ms-auto" type="checkbox" id="flexSwitchCheckDefault1">
                        <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0" for="flexSwitchCheckDefault1">Email me when someone answers on my post</label>
                      </div>
                    </li>
                    <li class="list-group-item border-0 px-0">
                      <div class="form-check form-switch ps-0">
                        <input class="form-check-input ms-auto" type="checkbox" id="flexSwitchCheckDefault2" checked>
                        <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0" for="flexSwitchCheckDefault2">Email me when someone mentions me</label>
                      </div>
                    </li>
                  </ul> -->
                  <!-- <h6 class="text-uppercase text-body text-xs font-weight-bolder mt-4">Application</h6> -->
                  <!-- <ul class="list-group">
                    <li class="list-group-item border-0 px-0">
                      <div class="form-check form-switch ps-0">
                        <input class="form-check-input ms-auto" type="checkbox" id="flexSwitchCheckDefault3">
                        <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0" for="flexSwitchCheckDefault3">New launches and projects</label>
                      </div>
                    </li>
                    <li class="list-group-item border-0 px-0">
                      <div class="form-check form-switch ps-0">
                        <input class="form-check-input ms-auto" type="checkbox" id="flexSwitchCheckDefault4" checked>
                        <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0" for="flexSwitchCheckDefault4">Monthly product updates</label>
                      </div>
                    </li>
                    <li class="list-group-item border-0 px-0 pb-0">
                      <div class="form-check form-switch ps-0">
                        <input class="form-check-input ms-auto" type="checkbox" id="flexSwitchCheckDefault5">
                        <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0" for="flexSwitchCheckDefault5">Subscribe to newsletter</label>
                      </div>
                    </li>
                  </ul> -->
                </div>
              </div>
            </div>
            <div class="col-12 col-xl-4">
              <div class="card card-plain ">
                <div class="card-header pb-0 p-3">
                  <div class="row">
                    <div class="col-md-8 d-flex align-items-center">
                      <h6 class="mb-0">Description</h6>
                    </div>
                    <div class="col-md-4 text-end">
                      <a href="javascript:;">
                        <!-- <i class="fas fa-user-edit text-secondary text-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Profile"></i> -->
                      </a>
                    </div>
                  </div>
                </div>
                <div class="card-body p-3">
                  <p class="text-sm">
                    <?php echo $work_details->description; ?>
                  </p>
                  <hr class="horizontal gray-light my-4">
                  <ul class="list-group" style="display:none;">
                    <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Full Name:</strong> &nbsp; Alec M. Thompson</li>
                    <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Mobile:</strong> &nbsp; (44) 123 1234 123</li>
                    <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Email:</strong> &nbsp; alecthompson@mail.com</li>
                    <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Location:</strong> &nbsp; USA</li>
                    <li class="list-group-item border-0 ps-0 pb-0">
                      <strong class="text-dark text-sm">Social:</strong> &nbsp;
                      <a class="btn btn-facebook btn-simple mb-0 ps-1 pe-2 py-0" href="javascript:;">
                        <i class="fab fa-facebook fa-lg"></i>
                      </a>
                      <a class="btn btn-twitter btn-simple mb-0 ps-1 pe-2 py-0" href="javascript:;">
                        <i class="fab fa-twitter fa-lg"></i>
                      </a>
                      <a class="btn btn-instagram btn-simple mb-0 ps-1 pe-2 py-0" href="javascript:;">
                        <i class="fab fa-instagram fa-lg"></i>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-12 col-xl-4" style="display:none;">
              <div class="card card-plain ">
                <div class="card-header pb-0 p-3">
                  <h6 class="mb-0">Conversations</h6>
                </div>
                <div class="card-body p-3">
                  <ul class="list-group">
                    <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2 pt-0">
                      <div class="avatar me-3">
                        <img src="<?php echo base_url()."assets/admin/"; ?>/assets/img/kal-visuals-square.jpg" alt="kal" class="border-radius-lg shadow">
                      </div>
                      <div class="d-flex align-items-start flex-column justify-content-center">
                        <h6 class="mb-0 text-sm">Sophie B.</h6>
                        <p class="mb-0 text-xs">Hi! I need more information<?php echo base_url()."assets/admin/"; ?></p>
                      </div>
                      <a class="btn btn-link pe-3 ps-0 mb-0 ms-auto w-25 w-md-auto" href="javascript:;">Reply</a>
                    </li>
                    <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2">
                      <div class="avatar me-3">
                        <img src="<?php echo base_url()."assets/admin/"; ?>/assets/img/marie.jpg" alt="kal" class="border-radius-lg shadow">
                      </div>
                      <div class="d-flex align-items-start flex-column justify-content-center">
                        <h6 class="mb-0 text-sm">Anne Marie</h6>
                        <p class="mb-0 text-xs">Awesome work, can you<?php echo base_url()."assets/admin/"; ?></p>
                      </div>
                      <a class="btn btn-link pe-3 ps-0 mb-0 ms-auto w-25 w-md-auto" href="javascript:;">Reply</a>
                    </li>
                    <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2">
                      <div class="avatar me-3">
                        <img src="<?php echo base_url()."assets/admin/"; ?>/assets/img/ivana-square.jpg" alt="kal" class="border-radius-lg shadow">
                      </div>
                      <div class="d-flex align-items-start flex-column justify-content-center">
                        <h6 class="mb-0 text-sm">Ivanna</h6>
                        <p class="mb-0 text-xs">About files I can<?php echo base_url()."assets/admin/"; ?></p>
                      </div>
                      <a class="btn btn-link pe-3 ps-0 mb-0 ms-auto w-25 w-md-auto" href="javascript:;">Reply</a>
                    </li>
                    <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2">
                      <div class="avatar me-3">
                        <img src="<?php echo base_url()."assets/admin/"; ?>/assets/img/team-4.jpg" alt="kal" class="border-radius-lg shadow">
                      </div>
                      <div class="d-flex align-items-start flex-column justify-content-center">
                        <h6 class="mb-0 text-sm">Peterson</h6>
                        <p class="mb-0 text-xs">Have a great afternoon<?php echo base_url()."assets/admin/"; ?></p>
                      </div>
                      <a class="btn btn-link pe-3 ps-0 mb-0 ms-auto w-25 w-md-auto" href="javascript:;">Reply</a>
                    </li>
                    <li class="list-group-item border-0 d-flex align-items-center px-0">
                      <div class="avatar me-3">
                        <img src="<?php echo base_url()."assets/admin/"; ?>/assets/img/team-3.jpg" alt="kal" class="border-radius-lg shadow">
                      </div>
                      <div class="d-flex align-items-start flex-column justify-content-center">
                        <h6 class="mb-0 text-sm">Nick Daniel</h6>
                        <p class="mb-0 text-xs">Hi! I need more information<?php echo base_url()."assets/admin/"; ?></p>
                      </div>
                      <a class="btn btn-link pe-3 ps-0 mb-0 ms-auto w-25 w-md-auto" href="javascript:;">Reply</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
<!-- --------------------------------------------------------------------------------------------------------------------------------------- -->

<div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Bids Recieved</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">SI No</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Bid Amount</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Proposal</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Contact</th>

                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Developer Name</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action </th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"> - </th>


                      <!-- <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Employed</th> -->
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php  $ctr=0; foreach ($bids_received as $bid){  $ctr++; ?>

                    <tr>
                      <td  class="align-middle text-center text-sm">
                          
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm"><?php echo $ctr; ?></h6>
                            <!-- <p class="text-xs text-secondary mb-0">john@creative-tim.com</p> -->
                          </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0"><?php echo $bid->bid_amount; ?> </p>
                        <!-- <p class="text-xs text-secondary mb-0">Organization</p> -->
                      </td>
                      <td class="align-middle text-center text-sm">
                      <p class="text-xs font-weight-bold mb-0"><?php echo $bid->proposal; ?> </p>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">  <?php echo $bid->phone_number; ?></span>
                      </td>

                      
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">   <?php echo $bid->first_name." ".$bid->last_name; ?></span>
                      </td>

                     
                      <td class="align-middle  text-center">
                        <?php 
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
                      </td>
                      <td  class="align-middle  text-center">
                      <?php if($bid->status == 0){ ?>
                        <br>
                        <!-- <button class="btn" onClick="showBidForm(<?php echo $bid->id ?>)">Accept</button> -->

                        <a href="<?php echo base_url()."accept_bid/".$bid->id; ?>">Accept</a>
                        <button class="btn btn-secondary m-3" onClick="makeorderid(<?php echo $bid->id.",".$bid->bid_amount; ?>)">Pay</button>
                            <br>
                            <p id='order-response'></p>
                        <br>
                        <button class="btn" onClick="showBidForm(<?php echo $bid->id ?>)">Reject</button>
                        <form id="<?php echo "bidForm_".$bid->id ?>" action="" style="display:none">
                            <input type="text">
                        </form>
                        <?php }else{
                            echo "Payment Done";
                        } ?>
                      </td>
                    </tr>
                    <?php }
                    ?>
                
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>



<!-- --------------------------------------------------------------------------------------------------------------------------------------- -->

          </div>
        </div>
      </div>
    </div>
    

        
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
<!-- <button id="rzp-button1">Pay</button> -->
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