<?php
class Payment_model extends CI_Model {
    public function insert_payment($data) {
        // Insert the payment data into the payment table
        $this->db->insert('payments', $data);
        
        // Check if the insertion was successful
        if ($this->db->affected_rows() > 0) {
            return true; // Insertion successful
        } else {
            return false; // Insertion failed
        }
    }
}
