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
            'status' => 0,
            'reason_for_rejection' => null,
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
        $this->db->join('freelancers f', 'f.user_id = b.freelancer_id');
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
    public function refundrequest($bidid){
        $data = array(
            'release_request' => 3, // Set the status to "accepted" or any appropriate value
        );
    
        $this->db->where('id', $bidid);
        $this->db->update('bids', $data);

        return true;
    }
    public function get_release_requests(){
        $this->db->select('*,b.status as bidstatus,b.id as bidid');
        $this->db->from('bids b');
        $this->db->join('works w', 'w.id = b.work_id');

            $this->db->where('b.release_request', 1);

        
        $query = $this->db->get();

        return $query->result_array();
    

    }
    public function get_refund_requests(){
        $this->db->select('*,b.status as bidstatus,b.id as bidid');
        $this->db->from('bids b');
        $this->db->join('works w', 'w.id = b.work_id');

            $this->db->where('b.release_request', 3);

        
        $query = $this->db->get();

        return $query->result_array();
    

    }
    public function releasefundbybid($bidid){
        $data = array(
            'release_request' => 2, // Set the status to "accepted" or any appropriate value
        );
    
        $this->db->where('id', $bidid);
        $this->db->update('bids', $data);

        return true;
    
    }

    public function refundbybid($bidid){
        $data = array(
            'release_request' => 4, // Set the status to "accepted" or any appropriate value
        );
    
        $this->db->where('id', $bidid);
        $this->db->update('bids', $data);

        return true;
    
    }

    public function get_released_fund_details(){
        $this->db->select('*,b.status as bidstatus,b.id as bidid,f.first_name as freelancer, c.first_name as customername');
        $this->db->from('bids b');
        $this->db->join('freelancers f', 'f.user_id = b.freelancer_id');


        $this->db->join('works w', 'w.id = b.work_id');
        $this->db->join('customers c', 'c.user_id = w.customer_id');


            $this->db->where('b.release_request', 2);

        
        $query = $this->db->get();

        return $query->result_array();
    
    }


    public function get_refund_details(){
        $this->db->select('*,b.status as bidstatus,b.id as bidid,f.first_name as freelancer, c.first_name as customername');
        $this->db->from('bids b');
        $this->db->join('freelancers f', 'f.user_id = b.freelancer_id');


        $this->db->join('works w', 'w.id = b.work_id');
        $this->db->join('customers c', 'c.user_id = w.customer_id');


            $this->db->where('b.release_request', 4);

        
        $query = $this->db->get();

        return $query->result_array();
    
    }

    public function get_bid_by_freelancer_work($freelancer_id,$work_id){
        $this->db->select('*');
        $this->db->from('bids');
        if($freelancer_id){
            $this->db->where('freelancer_id', $freelancer_id);
            $this->db->where('work_id', $work_id);


        }
        $query = $this->db->get();

        return $query->row_array();
    }

    public function freelancer_earnings($id){
        $table = "bids";
        $this->db->select_sum('bid_amount');
        $this->db->where('bids.freelancer_id', $id);
        $this->db->where('bids.release_request', 2);


        $result = $this->db->get($table);
        $sum = $result->row();
        return $sum->bid_amount;
    }

    public function delete_work($id){
        $this->db->where('work_id', $id); // Delete rows where the 'id' column equals 5
        $this->db->delete('bids'); // Delete from the 'my_table' table
    }

    public function reject_bid($data){
        $data1 = array(
            'status' => 2,
            'reason_for_rejection' => $data['reason'] // Set the status to "accepted" or any appropriate value
        );
    
        $this->db->where('id', $data['bid_id']);
        $this->db->update('bids', $data1);

        return true;
    }
}
