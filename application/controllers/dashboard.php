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
        $data['produk'] = $this->m_pemesanan->get_data('produk')->result();
        $this->load->view('v_header');
        $this->load->view('v_menu',$data);
        $this->load->view('v_footer');
    }

    function transaksi(){
        $data['produk'] = $this->m_pemesanan->get_data('produk')->result();
        $data['transaksi'] = $this->db->query("select * from transaksi,produk where produk_transaksi=id_produk")->result();
        $this->load->view('v_header');
        $this->load->view('v_transaksi',$data);
        $this->load->view('v_footer');
    }
}