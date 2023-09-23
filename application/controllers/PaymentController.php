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
        $this->load->model('Payment_model'); // Load the Payment_model 

        // Get the raw POST data as a JSON string
        $rawData = file_get_contents("php://input");
        
        // Decode the JSON data into an associative array
        $paymentData = json_decode($rawData, true);
        
        // Check if the data was successfully decoded
        if ($paymentData !== null) {
            // Insert the payment data into the database
            $this->load->database(); // Load the database library
            $insertData = array(
                'order_id' => $paymentData['order_id'],
                'amount' => $paymentData['amount'],
                'customer_id' => $paymentData['customer_id'],
                'bid' => $paymentData['bid'],
                'currency' => $paymentData['currency'],
                'payment_status' => $paymentData['payment_status'],
                'customer_name' => $paymentData['customer_name'],
                'customer_email' => $paymentData['customer_email'],
                'transaction_id' => $paymentData['transaction_id'],
                'payment_method' => $paymentData['payment_method'],
                'additional_info' => $paymentData['additional_info']
            );
            
            $this->db->insert('payments', $insertData);
            
            // Check if the insertion was successful
            if ($this->db->affected_rows() > 0) {
                $response = array('status' => 'success', 'message' => 'Payment data inserted successfully');
            } else {
                $response = array('status' => 'error', 'message' => 'Failed to insert payment data');
            }
        } else {
            $response = array('status' => 'error', 'message' => 'Invalid JSON data');
        }
        
        // Return a JSON response
        // $this->output
        //     ->set_content_type('application/json')
        //     ->set_output(json_encode($response));

        echo json_encode($response);
    }

}