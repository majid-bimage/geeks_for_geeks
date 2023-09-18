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
}
