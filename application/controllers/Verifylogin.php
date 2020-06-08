<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class VerifyLogin extends CI_Controller 
{
	function __construct() {
		parent::__construct();
        $this->load->model('mod_login');
        $this->load->library('pagination');
        $this->load->model('mod_produk');
	}
	
    function index() {
        $this->load->helper('security');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('username', 'User', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Pass', 'trim|required|xss_clean|callback_check_database');

        if($this->form_validation->run() == FALSE) {
            $this->load->view('login');
        }
        else {
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

            $this->load->view('welcome', $data);
        }
    }

    function check_database($password) {
        $username = $this->input->post('username');
        $result = $this->mod_login->login($username, $password);
    
        if ($result) {
            $sess_array = array();
            foreach($result as $row) {
                $sess_array = array(
                    'username' => $row->username,
                    'password' => $row->password
                );
                $this->session->set_userdata('logged_in', $sess_array);
            }
            return TRUE;
        } else {
            $this->form_validation->set_message('check_database', '<strong>Login Gagal!</strong>');
            return false;
        }
    }
}