<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Work_model extends CI_Model {

    public function insert_work($data) {
        // Insert the work data into the "works" table
        $this->db->insert('works', $data);
        return $this->db->insert_id(); // Return the inserted work's ID
    }

    public function insert_work_skills($work_id, $selected_skills) {
        // Insert selected skills into a separate table, e.g., "work_skills"
        foreach ($selected_skills as $skill_id) {
            $this->db->insert('work_skills', array('work_id' => $work_id, 'skill_id' => $skill_id));
        }
    }
    public function get_works_by_customer($customerid){

        $this->db->select('w.*');
        $this->db->from('works w');
        $this->db->where('w.customer_id', $customerid);
        $query = $this->db->get();

        return $query->result();
         if ($query->num_rows() > 0) {
             return $query->result(); // Return an array of skill objects
         } else {
             return array(); // Return an empty array if no skills are found
         }
    }
    
    public function get_skills_by_work($work_id){
        $this->db->select('s.*');
        $this->db->from('work_skills ws');
        $this->db->join('skills s', 's.id = ws.skill_id', 'left');
        $this->db->where('ws.work_id', $work_id);
        $query = $this->db->get();

        return $query->result_array();
    }

    public function get_work_details($work_id){
        $this->db->select('w.*');
        $this->db->from('works w');
        $this->db->where('w.id', $work_id);
        $query = $this->db->get();

        return $query->result();
         if ($query->num_rows() > 0) {
             return $query->result(); // Return an array of skill objects
         } else {
             return array(); // Return an empty array if no skills are found
         }
    }

    public function get_accepted_works_by_freelancer($freelancer_id) {
        $this->db->select('w.*');
        $this->db->from('works w');
        $this->db->join('bids b', 'b.work_id = w.id');
        $this->db->where('b.freelancer_id', $freelancer_id);
        $this->db->where('b.status', 1); // Assuming 'accepted' is the status for accepted bids
        $query = $this->db->get();

        return $query->result();
    }
    public function mark_work_as_completed($work_id) {
        $data = array(
            'status' => 1, // Set the status to "completed" or any appropriate value
        );
    
        $this->db->where('id', $work_id);
        $this->db->update('works', $data);
    }

    public function get_completed_works_by_freelancer($freelancer_id) {
        $this->db->select('w.*');
        $this->db->from('works w');
        $this->db->join('bids b', 'b.work_id = w.id');
        $this->db->where('b.freelancer_id', $freelancer_id);
        $this->db->where('b.work_progress', 2); // Assuming 'completed' is the status for completed works
        $query = $this->db->get();

        return $query->result();
    }

    public function get_works(){
        $this->db->select('w.*,c.first_name,c.email');
        $this->db->from('works w');
        $this->db->join('customers c', 'c.user_id = w.customer_id');

        $query = $this->db->get();
        return $query->result();

    }

    public function count_works(){
        $table = "works";
        $count = $this->db->count_all_results($table);
        return $count;
    }
    public function total_sales(){
        $table = "works";
        $this->db->select_sum('budget');
        $result = $this->db->get($table);
        $sum = $result->row();
        return $sum->budget;
    }
    public function total_sales_by_customer($id){
        $table = "works";
        $this->db->select_sum('budget');
        $this->db->where('works.customer_id', $id);

        $result = $this->db->get($table);
        $sum = $result->row();
        return $sum->budget;
    }
    public function works_completed($id){
        $table = "works";

        $this->db->where('status', 1);
        $this->db->where('works.customer_id', $id);

        $count = $this->db->count_all_results($table);
        return $count;

    }
    public function bids_recieved($id){
        $this->db->select('*');
        $this->db->from('works w');
        $this->db->join('bids b', 'b.work_id = w.id');

        $query = $this->db->get();
        $count = count($query->result());
        return $count;

    }
}
