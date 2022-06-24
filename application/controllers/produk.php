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

    public function delete_produk($id)
    {
    $data = $this->m_pemesanan->ambil_id_gambar($id);
    // lokasi gambar berada
    $path = './upload/images/';
    @unlink($path.$data->gambar);// hapus data di folder dimana data tersimpan
    $this->m_pemesanan->delete_data($id, 'id_produk','produk');
    redirect('dashboard/menu_list');
    }

    public function update_produk()
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

}