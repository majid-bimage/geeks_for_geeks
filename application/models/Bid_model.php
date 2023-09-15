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
}
