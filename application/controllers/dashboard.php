<?php
defined('BASEPATH') OR exit ('No direct script allowed');

class Dashboard extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        // cek Login
        if($this->session->userdata('status') !="login"){
            redirect(base_url().'Welcome?pesan=belumlogin');
        }
    }

    function index(){
        $this->load->view('v_header');
        $this->load->view('v_content');
        $this->load->view('v_footer');
    }

    function menu_list(){
        $this->load->view('v_header');
        $this->load->view('v_menu');
        $this->load->view('v_footer');
    }

    function tambah_menu(){

    }
}