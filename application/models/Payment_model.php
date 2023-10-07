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

    public function get_payment_details($id){

        $this->db->select('p.*,u.email fmail,w.work_title');
        $this->db->from('payments p');
        $this->db->join('bids b', 'p.bid = b.id');
        $this->db->join('works w', 'b.work_id = w.id');
        $this->db->join('users u', 'u.id = b.freelancer_id');


        $this->db->where('p.customer_id', $id);
        $query = $this->db->get();
        return $query->result();
    }
}
