<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller{
  function __construct(){
    parent::__construct();
    if($this->session->userdata('logged_in') !== TRUE){
      redirect('index_view');
    }
  }
 
  function index(){
    //Allowing akses to admin only
      if($this->session->userdata('tip_user')==='0'){
          $this->load->view('index_view');
      }else{
          echo "Access Denied";
      }
 
  }
 
  function staff(){
    //Allowing akses to staff only
    if($this->session->userdata('tip_user')==='1'){
      $this->load->view('index_view');
    }else{
        echo "Access Denied";
    }
  }
 
  function author(){
    //Allowing akses to author only
    if($this->session->userdata('tip_user')==='2'){
      $this->load->view('index_view');
    }else{
        echo "Access Denied";
    }
  }
 
}