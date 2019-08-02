<?php
defined('BASEPATH') OR exit('no direct script accesse allowed');

class blog extends CI_Controller{

    function __construct(){
        parent::__construct();
        $this->load->model('blog_m','m');
    }

    function index(){
        $data['blogs'] = $this->m->getblog();
        $this->load->view('layout/header');
        $this->load->view('blog/index',$data);
        $this->load->view('layout/footer');
    }

    public function add(){
        $this->load->view('layout/header');
        $this->load->view('blog/add');
        $this->load->view('layout/footer'); 

    }
    public function submit(){
        $result = $this->m->submit();
        if($result){
            $this->session->set_flashdata('success_msg','record added successfully');

        }
        else{
            $this->session->set_flashdata('error_msg','fail to add record');
        }
        redirect(base_url('blog/index'));

    }
    public function edit($id){
        $data['blog']=$this->m->getBlogById($id);
        $this->load->view('layout/header');
        $this->load->view('blog/edit', $data);
        $this->load->view('layout/footer');

    }
    public function update(){
        $result = $this->m->update();
        if($result){
            $this->session->set_flashdata('success_msg','record upated successfully');

        }
        else{
            $this->session->set_flashdata('error_msg','fail to update record');
        }
        redirect(base_url('blog/index'));
    }
    public function delete($id){
        $result = $this->m->delete($id);
        if($result){
            $this->session->set_flashdata('success_msg','record deleted successfully');

        }
        else{
            $this->session->set_flashdata('error_msg','fail to delete record');
        }
        redirect(base_url('blog/index'));

    }
}
