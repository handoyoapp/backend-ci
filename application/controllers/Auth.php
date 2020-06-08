<?php

require (APPPATH.'/libraries/REST_Controller.php');
use Restserver\Libraries\REST_Controller;

class Auth extends REST_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->model('Mod_produk');
    }
    
    public function index_get(){
        $response = $this->Mod_produk->get_all_produk();
        $this->response($response);
    }

    public function login_get(){
        $response['error']=false;
        $response['message']="Login Berhasil";
        $response['data']['token']='eyJhbGciOiJIUzI1NiJ9.eyJpZCI6MTcsIm5payI6IjEwMTciLCJrdHAiOiIiLCJzY2FuS1RQIjoiIiwiZ2VsYXJEZXBhbiI6IiIsIm5hbWEiOiJBYmR1bGxhaCBIYW16YWgiLCJmb3RvIjoiIiwiZ2VsYXJCZWxha2FuZyI6IiIsIm5hbWFQYW5nZ2lsYW4iOiIiLCJ0ZW1wYXRMYWhpciI6IiIsInRhbmdnYWxMYWhpciI6IjIwMTUtMTEtMjkiLCJqZW5pc0tlbGFtaW4iOiJMYWtpLWxha2kiLCJhZ2FtYSI6IklzbGFtIiwiYWxhbWF0S1RQIjoiIiwicHJvdmluc2lLVFAiOiIzMyIsImtvdGFLVFAiOiIzMzc0Iiwia2VjYW1hdGFuS1RQIjoiMzM3NDA5MCIsImtlbHVyYWhhbktUUCI6IiIsImtvZGVwb3NLVFAiOiIiLCJhbGFtYXRUaW5nZ2FsIjoiIiwicHJvdmluc2lUaW5nZ2FsIjoiMzMiLCJrb3RhVGluZ2dhbCI6IjMzNzQiLCJrZWNhbWF0YW5UaW5nZ2FsIjoiMzM3NDA5MCIsImtlbHVyYWhhblRpbmdnYWwiOiIiLCJrb2RlcG9zVGluZ2dhbCI6IiIsInBob25lIjoiIiwic3RhdHVzUGVya2F3aW5hbiI6IlBlcmpha2EvUGVyYXdhbiIsImtrIjoiIiwic2NhbktLIjoiIiwibnB3cCI6IiIsInNjYW5OUFdQIjoiIiwiYnBqc3RrIjoiIiwiYnBqc2tlcyI6IiIsImdvbG9uZ2FuRGFyYWgiOiJBIiwibm9tb3JSZWthbU1lZGlrIjoiIiwibm9tb3JTSU0iOiJ7XCJTSU0gQVwiOlwiXCJ9Iiwibm9tb3JSZWtlbmluZyI6IntcIkJhbmsgQlJJXCI6XCJcIn0iLCJnb2xvbmdhbiI6MSwicHJvZmVzaSI6NiwiamFiYXRhbiI6IjEiLCJ1bml0IjoxLCJzdGF0dXNLZXBlZ2F3YWlhbiI6MSwiYWt0YUtlbWF0aWFuIjoiIiwidGFuZ2dhbEtlbWF0aWFuIjpudWxsLCJjcmVhdGVkQnkiOjIsInVwZGF0ZWRBdCI6IjIwMjAtMDUtMTVUMjA6MzQ6MjIuMDAwWiIsInVwZGF0ZWRCeSI6MiwiZGVsZXRlZEF0IjpudWxsLCJkZWxldGVkQnkiOm51bGwsImNyZWF0ZWRBdCI6IjIwMjAtMDUtMTVUMjA6MzQ6MjIuMDAwWiJ9.mE7wbmstiqovWY2egRoo1wJw140Am4ys3YcEE3H4ylA';
        $response['data']['user']['id']=17;
        $response['data']['user']['nik']='1017';
        $response['data']['user']['ktp']='';
        $response['data']['user']['scanKTP']='';
        $response['data']['user']['gelarDepan']='';
        $response['data']['user']['nama']='Handoyo';
        $response['data']['user']['foto']='';
        $response['data']['user']['gelarBelakang']='';
        $response['data']['user']['namaPanggilan']='';
        $response['data']['user']['tempatLahir']='Kab. Semarang';
        $response['data']['user']['tanggalLahir']='1995-11-29';
        $response['data']['user']['jenisKelamin']='Laki-laki';
        $response['data']['user']['agama']='Islam';
        $response['data']['user']['alamatKTP']='Cerbonan RT 01/RW 08 Banyubiru';
        $response['data']['user']['provinsiKTP']='33';
        $response['data']['user']['kotaKTP']='3374';
        $response['data']['user']['kecamatanKTP']='3374090';
        $response['data']['user']['kelurahanKTP']='';
        $response['data']['user']['kodeposKTP']='50664';
        $response['data']['user']['alamatTinggal']='';
        $response['data']['user']['provinsiTinggal']='33';
        $response['data']['user']['kotaTinggal']='3374';
        $response['data']['user']['kecamatanTinggal']='3374090';
        $response['data']['user']['kelurahanTinggal']='';
        $response['data']['user']['kodeposTinggal']='';
        $response['data']['user']['phone']='085870927601';
        $response['data']['user']['statusPerkawinan']='Perjaka/Perawan';
        $response['data']['user']['kk']='';
        $response['data']['user']['scanKK']='';
        $response['data']['user']['npwp']='';
        $response['data']['user']['scanNPWP']='';
        $response['data']['user']['bpjstk']='';
        $response['data']['user']['bpjskes']='';
        $response['data']['user']['golonganDarah']='O';
        $response['data']['user']['nomorRekamMedik']='';
        $response['data']['user']['nomorSIM']='{\'SIM A\':\'\'}';
        $response['data']['user']['nomorRekening']='{\'Bank BCA\':\'\'}';
        $response['data']['user']['gologan']=1;
        $response['data']['user']['profesi']=6;
        $response['data']['user']['jabatan']='1';
        $response['data']['user']['unit']=1;
        $response['data']['user']['statusKepegawaian']=1;
        $response['data']['user']['aktaKematian']='';
        $response['data']['user']['tanggalKematian']=null;
        $response['data']['user']['createdBy']=2;
        $response['data']['user']['updatedAt']='2020-05-15T20:34:22.000Z';
        $response['data']['user']['updatedBy']=2;
        $response['data']['user']['deletedAt']=null;
        $response['data']['user']['deletedBy']=null;
        $response['data']['user']['createdAt']='2020-05-15T20:34:22.000Z';
        $this->response($response);
    }
} 
?>