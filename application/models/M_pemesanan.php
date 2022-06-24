<?php
class M_pemesanan extends CI_Model{

function edit_data($where,$table) {
    return $this->db->get_where($table,$where);
}

function get_data($table) {
    return $this->db->get($table);
}

function insert_data($data,$table) {
    $this->db->insert($table,$data);
}

function update_data($where,$data,$table) {
    $this->db->where($where);
    $this->db->update($table,$data);
}

function delete_data($id,$where,$table) {
    $this->db->where($where, $id);
    $this->db->delete($table);
}
function ambil_id_gambar($id)
{
    $this->db->from('produk');
    $this->db->where('id_produk', $id);
    $result = $this->db->get('');
    // periksa ada datanya atau tidak
    if ($result->num_rows() > 0) {
      return $result->row();//ambil datanya berdasrka row id
    }
}
}
?>