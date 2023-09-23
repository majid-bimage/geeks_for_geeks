<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bid_model extends CI_Model {

    public function insert_bid($freelancer_id, $work_id, $bid_amount, $proposal) {
        // Insert the bid into the database
        $data = array(
            'freelancer_id' => $freelancer_id,
            'work_id' => $work_id,
            'bid_amount' => $bid_amount,
            'proposal' => $proposal,
        );
        $this->db->insert('bids', $data);
    }

    public function update_bid($bid_id, $bid_amount, $proposal) {
        // Update the bid in the database
        $data = array(
            'bid_amount' => $bid_amount,
            'proposal' => $proposal,
        );
    
        $this->db->where('id', $bid_id);
        $this->db->update('bids', $data);
    }
    

    public function get_submitted_bids($freelancer_id){
        $this->db->select('*');
        $this->db->from('bids');
        if($freelancer_id){
            $this->db->where('freelancer_id', $freelancer_id);
        }
        $query = $this->db->get();

        return $query->result_array();
    }

    public function get_bids_for_work($work_id) {
        $this->db->select('b.*, f.first_name, f.last_name, f.phone_number'); // Include the freelancer details you need
        $this->db->from('bids b');
        $this->db->join('freelancers f', 'f.id = b.freelancer_id');
        $this->db->where('b.work_id', $work_id);
        $query = $this->db->get();

        return $query->result();
    }

    public function accept_bid($bid_id){
        $data = array(
            'status' => 1, // Set the status to "accepted" or any appropriate value
        );
    
        $this->db->where('id', $bid_id);
        $this->db->update('bids', $data);

        return true;
    }
    public function get_accepted_bids($freelancer_id){
        $this->db->select('*,b.status as bidstatus,b.id as bidid');
        $this->db->from('bids b');
        $this->db->join('works w', 'w.id = b.work_id');

        if($freelancer_id){
            $this->db->where('freelancer_id', $freelancer_id);
            $this->db->where('b.status', 1);

        }
        $query = $this->db->get();

        return $query->result_array();
    
    }

    
    
    public function get_accepted_bids_by_customer($customer_id){
        $this->db->select('*,b.status as bidstatus,b.id as bidid');
        $this->db->from('bids b');
        $this->db->join('works w', 'w.id = b.work_id');

        if($customer_id){
            $this->db->where('customer_id', $customer_id);
            $this->db->where('b.status', 1);

        }
        $query = $this->db->get();

        return $query->result_array();
    
    }
    public function markcompleted($bidid,$bidstatus){
        $data = array(
            'work_progress' => $bidstatus, // Set the status to "accepted" or any appropriate value
        );
    
        $this->db->where('id', $bidid);
        $this->db->update('bids', $data);

        return true;
    }
    public function releasefund($bidid){
        $data = array(
            'release_request' => 1, // Set the status to "accepted" or any appropriate value
        );
    
        $this->db->where('id', $bidid);
        $this->db->update('bids', $data);

        return true;
    }
}
