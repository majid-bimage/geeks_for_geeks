<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PaymentController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Customer_model'); // Load the Customer model
        $this->load->model('Payment_model'); // Load the Payment_model 

        
        $this->load->helper('form');
    }
    public function createRazorpayOrder()
    {
        require_once(APPPATH . './razorpay/Razorpay.php');

        // Load the Razorpay library
        $razorpay = new Razorpay\Api\Api("rzp_test_iUQcWB2aQqJXPM", "NjnWtmg0LHljtM2s7joWYj1s");
        $amount = $this->input->post('amount');
        $bid = $this->input->post('bid');

        // Create a Razorpay order
        $orderData = array(
            'amount' => $amount, // Amount in paise (100 paise = 1 INR)
            'currency' => 'INR',
            'receipt' => 'order_rcptid_'.$bid,
        );

        // Handle the order data or redirect user to the Razorpay payment page
        // ...
        try {
            $order = $razorpay->order->create($orderData);
            log_message("error","-----------------");

            // Return the order details as JSON response
            // print_r($order);
            echo json_encode($order->toArray());
        } catch (Exception $e) {
            log_message("error","***********************");

            // Handle errors here
            echo json_encode(['error' => $e->getMessage()]);
        }
    }

    public function insert_payment_data() {
        // Example data for insertion (replace with actual data)
        $payment_data = array(
            'order_id' => '123456',
            'amount' => 100.00,
            'currency' => 'INR',
            'payment_status' => 'completed',
            'customer_name' => 'John Doe',
            'customer_email' => 'john@example.com',
            'transaction_id' => 'TX123456',
            'payment_method' => 'credit card',
            'additional_info' => 'Additional payment info',
        );

        // Insert the payment data into the database using the model
        $inserted = $this->Payment_model->insert_payment($payment_data);

        if ($inserted) {
            echo "Payment data inserted successfully.";
        } else {
            echo "Failed to insert payment data.";
        }
    }
}