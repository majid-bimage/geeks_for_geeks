<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SiteController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Freelancer_model'); // Load the Freelancer model
        $this->load->model('Skill_model'); // Load the Skill_model model
        $this->load->model('Bid_model'); // Load the Bid_model model
        $this->load->model('Work_model'); // Load the Work_model model
        $this->load->helper('form');
    }

    public function index() {
        // Load the registration form view for freelancers
        $this->load->view('site/header');
        $this->load->view('site/home');
        $this->load->view('site/footer');
    }
}