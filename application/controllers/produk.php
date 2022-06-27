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

        $this->load->library('cart');
    }

    function do_upload(){
        $config['upload_path']          = 'upload/images';  // folder upload 
        $config['allowed_types']        = 'jpg|png'; // jenis file
        $config['max_size']             = '15000';
        $config['max_width']            = '700';
        $config['max_height']           = '467';

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
            $this->m_pemesanan->insert_data($data,'produk');
            redirect('dashboard/menu_list');
       }
    }

    function delete_produk($id)
    {
    $data = $this->m_pemesanan->ambil_id_gambar($id);
    // lokasi gambar berada
    $path = './upload/images/';
    @unlink($path.$data->gambar);// hapus data di folder dimana data tersimpan
    $this->m_pemesanan->delete_data($id, 'id_produk','produk');
    redirect('dashboard/menu_list');
    }

    function update_produk()
    {
        $id   = $this->input->post('id_produk');
        $nama = $this->input->post('nama');
        $stok = $this->input->post('stok');
        $harga = $this->input->post('harga');

        $path = './upload/images/';

        $where = array('id_produk' => $id );

        // get foto
        $config['upload_path'] = './upload/images';
        $config['allowed_types'] = 'jpg|png';
        $config['max_size'] = '15000';  //2MB max
        $config['max_width'] = '700'; // pixel
        $config['max_height'] = '467'; // pixel
        $config['file_name'] = $_FILES['gambarbaru']['name'];

        $this->load->library('upload', $config);

        $this->upload->initialize($config);

            if (!empty($_FILES['gambarbaru']['name'])) {
                if ( $this->upload->do_upload('gambarbaru') ) {
                    $gambar = $this->upload->data();
                    $data = array(
                                'nama_produk'       => $nama,
                                'stok'              => $stok,
                                'harga'             => $harga,
                                'gambar'            => $gambar['file_name']
                                );
                // hapus foto pada direktori
                @unlink($path.$this->input->post('gambarlama'));

                $this->m_pemesanan->update_data($where,$data,'produk');
                // var_dump($data);
                redirect('dashboard/menu_list',$data);
                }   else {
                die("gagal update");
                }
            }else {
            echo "tidak masuk";
            }

    }

    function add_transaksi_action(){
        $nama_customer = $this->input->post('customer');
        $produk_transaksi = $this->input->post('produk');
        $quantity = $this->input->post('quantity');
        $harga = $this->db->query("select harga from produk where id_produk=$produk_transaksi")->row()->harga;
        $stok = $this->db->query("select stok from produk where id_produk=$produk_transaksi")->row()->stok;

        $this->form_validation->set_rules('customer','Nama Customer','required');
        $this->form_validation->set_rules('produk','Nama Produkr','required');
        $this->form_validation->set_rules('quantity','Jumlah','required');

        if($this->form_validation->run() != false){
            $total_harga = $harga * $quantity;
            $stok_baru   = $stok - $quantity;

            $data = array(
                'nama_customer' => $nama_customer,
                'produk_transaksi' => $produk_transaksi,
                'total_harga' => $total_harga,
                'quantity' => $quantity,
                'tanggal_transaksi' => date('Y-m-d') 
            );
            $this->m_pemesanan->insert_data($data,'transaksi');

              $d = array(
                'stok' => $stok_baru
              );
              $w = array(
                'id_produk' => $produk_transaksi
              );
              $this->m_pemesanan->update_data($w,$d,'produk');
              redirect(base_url().'dashboard/transaksi');
        }
    }

    function transaksi_delete($id){
        $produk_transaksi = $this->db->query("select produk_transaksi from transaksi where id_transaksi=$id")->row()->produk_transaksi;
        $stok = $this->db->query("select stok from produk where id_produk=$produk_transaksi")->row()->stok;
        $quantity = $this->db->query("select quantity from transaksi where produk_transaksi=$produk_transaksi")->row()->quantity;

        $stok_after_deletion = $stok + $quantity;

        $id_transaksi = array(
            'id_transaksi' => $id
        );
        $data = $this->m_pemesanan->edit_data($id_transaksi,'transaksi')->row();
        
        $id_produk = array(
            'id_produk' => $data->produk_transaksi
        );
        $stok = array(
            'stok' => $stok_after_deletion
        );
        $this->m_pemesanan->update_data($id_produk,$stok,'produk');
        $this->m_pemesanan->delete_data($id,'id_transaksi','transaksi');
        redirect(base_url().'dashboard/transaksi');
    }

    function update_transaksi(){
        $id = $this->input->post('id_transaksi');
        $produk_transaksi_old = $this->db->query("select produk_transaksi from transaksi where id_transaksi=$id")->row()->produk_transaksi;
        $nama_customer_new = $this->input->post('customer');
        $produk_transaksi_new = $this->input->post('produk_transaksi_new');
        $quantity_new = $this->input->post('quantity');
        $harga = $this->db->query("select harga from produk where id_produk=$produk_transaksi_new")->row()->harga;
        $stok = $this->db->query("select stok from produk where id_produk=$produk_transaksi_old")->row()->stok;
        $quantity_old = $this->db->query("select quantity from transaksi where id_transaksi=$id")->row()->quantity;

        $this->form_validation->set_rules('customer','Nama Customer','required');
        $this->form_validation->set_rules('produk_transaksi_new','Nama Produk','required');
        $this->form_validation->set_rules('quantity','Jumlah','required');

        if($this->form_validation->run() != false){
            $total_harga = $harga * $quantity_new;
            $stok_old   = $stok + $quantity_old;

            $where = array('id_transaksi' => $id );

            $id_produk_old = array(
                'id_produk' => $produk_transaksi_old
            );
            $stok_restore = array(
                'stok' => $stok_old
            );
            $this->m_pemesanan->update_data($id_produk_old,$stok_restore,'produk');

            $data = array(
                'nama_customer' => $nama_customer_new,
                'produk_transaksi' => $produk_transaksi_new,
                'total_harga' => $total_harga,
                'quantity' => $quantity_new,
            );
            $this->m_pemesanan->update_data($where,$data,'transaksi');

            $stok = $this->db->query("select stok from produk where id_produk=$produk_transaksi_new")->row()->stok;

            $stok_new = $stok - $quantity_new;

            $id_produk_new = array(
                'id_produk' => $produk_transaksi_new
            );
            $stok_update = array(
                'stok' => $stok_new
            );
            $this->m_pemesanan->update_data($id_produk_new,$stok_update,'produk');

            $data = array(
                'nama_customer' => $nama_customer_new,
                'produk_transaksi' => $produk_transaksi_new,
                'total_harga' => $total_harga,
                'quantity' => $quantity_new,
            );
            $this->m_pemesanan->update_data($where,$data,'transaksi');

            redirect(base_url().'dashboard/transaksi');
        } else{
            echo 'Gagal update';
        }
    }
}