<?php
defined('BASEPATH') OR exit ('No direct script allowed');

class Produk extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        // cek Login
        if($this->session->userdata('status') !="login"){
            redirect(base_url().'Welcome?pesan=belumlogin');
        }
    }

    public function do_upload(){
        $config['upload_path']          = 'upload';  // folder upload 
        $config['allowed_types']        = 'jpg|png'; // jenis file
        $config['max_size']             = 2000;
        $config['max_width']            = 700;
        $config['max_height']           = 467;

       $this->load->library('upload', $config);

       if ( ! $this->upload->do_upload('gambar')) //sesuai dengan name pada form 
       {
              echo 'anda gagal upload';
       }
       else
       {
           //tampung data dari form
           $nama   = $this->input->post('nama');
           $stok   = $this->input->post('stok');
           $harga  = $this->input->post('harga');
           $file   = $this->upload->data();
           $gambar = $file['file_name'];
           
            $data=array(
                'nama_produk' => $nama,
                'stok' => $stok,
                'harga' => $harga,
                'gambar' => $gambar,
            );
        $this->m_pemesanan->insert($data);
        redirect('dashboard/menu_list');
       }
    }
}