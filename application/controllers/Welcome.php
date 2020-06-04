<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

   public function __construct() {
      parent:: __construct();
      $this->load->library('pagination');
      $this->load->model('mod_produk');
   }   

   public function index() {
       $this->load->view('welcome');
   }

   public function welcome()
   {
      $config["base_url"] = base_url().'index.php/welcome/welcome';
      $config["total_rows"] = $this->mod_produk->record_count();
      $config["uri_segment"] = 3;
      $config["per_page"] = 5;

      $config['num_links'] = 2;
      $config['use_page_numbers'] = TRUE;
      $config['page_query_string'] = FALSE;
      $config['query_string_segment'] = '';

      $config['full_tag_open'] = '<ul class="pagination pagination-sm">';
      $config['full_tag_close'] = '</ul>';

      $config['first_link'] = '&laquo; First';
      $config['first_tag_open'] = '<li class="prev page">';
      $config['first_tag_close'] = '</li>';

      $config['last_link'] = 'Last &raquo;';
      $config['last_tag_open'] = '<li class="next page">';
      $config['last_tag_close'] = '</li>';

      $config['next_link'] = 'Next &rarr;';
      $config['next_tag_open'] = '<li class="next page">';
      $config['next_tag_close'] = '</li>';

      $config['prev_link'] = '&larr; Previous';
      $config['prev_tag_open'] = '<li class="prev page">';
      $config['prev_tag_close'] = '</li>';

      $config['cur_tag_open'] = '<li class="active"> <a href="">';
      $config['cur_tag_close'] = '</a></li>';
      $config['num_tag_open'] = '<li class="page">';
      $config['num_tag_close'] = '</li>';

      $config['anchor_class'] = 'follow_link';
      $this->pagination->initialize($config);

      $page = $this->uri->segment(3);
      if($page==''){
         $page=0;
      }else{
         $page = ($page-1)*$config["per_page"];
      }

      $data['results'] = $this->mod_produk->get_produk($config["per_page"],$page);
      $data['ttl_page'] = $config["per_page"];
      $data['ttl_row'] = $config["total_rows"];
      $data["links"] = $this->pagination->create_links();
      $data['page'] = $page;

      $this->load->view('welcome',$data);
   }

   public function simpan_produk()
   {
      $config['upload_path'] = './uploads/';
      $config['allowed_types'] = 'jpg|jpeg|png';
      $config['max_size'] = 500;
      $config['max_width'] = 1600;
      $config['max_height'] = 1600;
      $config['encrypt_name'] = TRUE;

      $this->load->library('upload', $config);
      $this->upload->initialize($config);

      if ( ! $this->upload->do_upload('image')){
         $error = array('error' =>  $this->upload->display_errors());
         echo $this->upload->display_errors();
      } else {
         $data = array(
            'nama_barang' => $this->input->post('nama_barang'),
            'harga' => $this->input->post('harga'),
           'stok' => $this->input->post('stok'),
            'img' => $this->upload->data('file_name')
         );

         $this->mod_produk->simpan_produk($data);
         redirect('/welcome/welcome');
      }
   }

   public function edit_produk()
   {
      $id = $this->input->post('e_id_barang');
      $config['upload_path'] = './uploads/';
      $config['allowed_types'] = 'jpg|jpeg|png';
      $config['max_size'] = 500; $config['max_width'] = 1600;
      $config['max_height'] = 1600; $config['encrypt_name'] = TRUE;
      $this->load->library('upload', $config);
      $this->upload->initialize($config);

      if ( ! $this->upload->do_upload('e_image')){
         $error = array('error' =>  $this->upload->display_errors());
         $data = array(
            'nama_barang' => $this->input->post('e_nama_barang'),
            'harga' => $this->input->post('e_harga'),
            'stok' => $this->input->post('e_stok')
         );

         $this->mod_produk->edit_produk($data,$id);
         redirect('/welcome/welcome');
      } else {
         $this->load->helper("file");
         $path = './uploads/'.$this->input->post('e_img');
         if (file_exists($path)) unlink($path);

         $data = array(
            'nama_barang' => $this->input->post('e_nama_barang'),
            'harga' => $this->input->post('e_harga'),
            'stok' => $this->input->post('e_stok'),
            'img' => $this->upload->data('file_name')
         );

         $this->mod_produk->edit_produk($data,$id);
         redirect('/welcome/welcome');
      }
   }

   public function hapus_produk()
   {
      $id = $this->input->get('id');
      $img = $this->input->get('img');
      $this->mod_produk->hapus_produk($id,$img);
      redirect('/welcome/welcome');
   }
}