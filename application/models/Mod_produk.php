<?php
 
Class Mod_produk extends CI_Model
{
   
   public function record_count() {
      return $this->db->count_all("barang");
   }
 
   public function get_produk($limit, $start)
   {
      $this->db->order_by('id_barang', 'DESC');
      $this->db->limit($limit,$start);
      $query = $this->db->get("barang");
      if ($query->num_rows() > 0) {
         foreach ($query->result() as $row) {
            $data[] = $row;
         }
         return $data;
      }
      return false;
   }
 
   function simpan_produk($data)
   {
      $this->db->insert('barang',$data);
      return TRUE;
   }
 
   function edit_produk($data,$id)
   {
      $this->db->where('id_barang',$id);
      $this->db->update('barang',$data);
      return TRUE;
   }
 
   function hapus_produk($id,$img)
   {
      $this->load->helper("file");
      $path = './uploads/'.$img;
      unlink($path);
      $this->db->where('id_barang',$id);
      $this->db->delete('barang');
      return TRUE;
   }

   public function get_all_produk()
   {
      $this->db->order_by('id_barang', 'DESC');
      $query = $this->db->get("barang");
      if ($query->num_rows() > 0) {
         $response = array();
         $response['error'] = false;
         $response['message'] = 'List Produk';
         foreach ($query->result() as $row) {
            $tempArray = array();
            $tempArray['id_barang'] = $row->id_barang;
            $tempArray['nama_barang'] = $row->nama_barang;
            $tempArray['harga'] = $row->harga;
            $tempArray['stok'] = $row->stok;
            $tempArray['img'] = base_url() . 'uploads/' . $row->img;
            $response['data'][] = $tempArray;
         }
         return $response;
      }
      return false;
   }
}