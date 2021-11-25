<?php

Class Mod_catatan extends CI_Model
{
   public function daftarCatatan()
   {
      $this->db->order_by('tanggal', 'DESC');
      $query = $this->db->get("catatan");
      $response = array();
      if ($query->num_rows() > 0)
      {
         $response['error'] = false;
         $response['message'] = 'Berhasil ambil daftar catatan';
         foreach ($query->result() as $row)
         {
            $tempArray = array();
            $tempArray['id'] = (int)$row->id;
            $tempArray['tanggal'] = $row->tanggal;
            $tempArray['judul'] = $row->judul;
            $tempArray['catatan'] = $row->catatan;
            $response['data'][] = $tempArray;
         }
         return $response;
      } else {
          $response['error'] = true;
          $response['message'] = 'Gagal ambil daftar catatan';
          return $response;
      }
   }

   public function tambahCatatan()
   {
        $json = file_get_contents('php://input');
        $obj = json_decode($json);
        $response = array();
        $data = array();
        $data['tanggal'] = $obj->tanggal;
        $data['judul'] = $obj->judul;
        $data['catatan'] = $obj->catatan;
        $insert = $this->db->insert('catatan',$data);
        if ($insert) {
            $response['error'] = false;
            $response['message'] = 'Daftar catatan berhasil ditambah';
            return $response;
        } else {
            $response['error'] = false;
            $response['message'] = 'Daftar catatan gagal ditambah';
            return $response;
        }
   }

   public function ubahCatatan()
   {
        $json = file_get_contents('php://input');
        $obj = json_decode($json);
        $response = array();
        $data = array();
        $data['tanggal'] = $obj->tanggal;
        $data['judul'] = $obj->judul;
        $data['catatan'] = $obj->catatan;
        $this->db->where('id',$obj->id);
        $update = $this->db->update('catatan',$data);
        if ($update) {
            $response['error'] = false;
            $response['message'] = 'Daftar catatan berhasil diubah';
            $response['data'] = $data;
            return $response;
        } else {
            $response['error'] = true;
            $response['message'] = 'Daftar catatan gagal diubah';
            return $response;
        }
   }

   public function hapusCatatan()
   {
      $this->db->where('id',$_GET['id']);
      $delete = $this->db->delete('catatan');
      $response = array();
      if ($delete) {
        $response['error'] = false;
        $response['message'] = 'Daftar catatan berhasil dihapus';
        return $response;
      } else {
        $response['error'] = true;
        $response['message'] = 'Daftar catatan gagal dihapus';
        return $response;
      }
   }
}