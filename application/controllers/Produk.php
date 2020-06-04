<?php

require (APPPATH.'/libraries/REST_Controller.php');
use Restserver\Libraries\REST_Controller;

class Produk extends REST_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->model('Mod_produk');
    }
    
    public function index_get(){
        $response = $this->Mod_produk->get_all_produk();
        $this->response($response);
    }
} 
?>