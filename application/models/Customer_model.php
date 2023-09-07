<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_model extends CI_Model {

    public function register_customer($data) {
        // Insert the user registration data into the "users" table
        $user_data = array(
            'username' => $data['email'], // You can use email as the username or create a separate username field
            'email' => $data['email'],
            'password' => password_hash($data['password'], PASSWORD_DEFAULT),
            'role' => 'customer', // Set the role to 'customer'
        );
        $this->db->insert('users', $user_data);

        // Get the user ID of the newly inserted user
        $user_id = $this->db->insert_id();

        // Insert the customer-specific data into the "customers" table
        $customer_data = array(
            'user_id' => $user_id, // Assign the user ID obtained above
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            // Add more customer-specific fields as needed
        );
        $this->db->insert('customers', $customer_data);

        return $user_id; // Return the user ID for further use if needed
    }
}
