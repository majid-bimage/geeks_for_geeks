<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PaymentController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Customer_model'); // Load the Customer model
        $this->load->helper('form');
    }
    public function createRazorpayOrder()
    {
        log_message("error","-----------------");
        require_once(APPPATH . './razorpay/Razorpay.php');

        // Load the Razorpay library
        $razorpay = new Razorpay\Api\Api("rzp_test_iUQcWB2aQqJXPM", "NjnWtmg0LHljtM2s7joWYj1s");

        // Create a Razorpay order
        $orderData = array(
            'amount' => 1000, // Amount in paise (100 paise = 1 INR)
            'currency' => 'INR',
            'receipt' => 'order_rcptid_11',
        );

        // Handle the order data or redirect user to the Razorpay payment page
        // ...
        try {
            $order = $razorpay->order->create($orderData);
            // Return the order details as JSON response
            echo json_encode($order);
        } catch (Exception $e) {
            // Handle errors here
            echo json_encode(['error' => $e->getMessage()]);
        }
    }

}