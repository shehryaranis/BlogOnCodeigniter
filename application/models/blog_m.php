<?php
defined('BASEPATH') OR exit('no direct script accesse allowed');

class blog_m extends CI_Model{
    public function getBlog(){
        $this->db->order_by('created_at','desc');
        $query = $this->db->get('blog-user');
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return false;
        }
    }
        public function submit(){
            $field = array(
                'title'=>$this->input->post('txt_title'),
                'description'=>$this->input->post('txt_description'),
                'created_at'=>date('Y-m-d H:i:s')
            );
            $this->db->insert('blog-user',$field);
            if ($this->db->affected_rows() > 0){
                    return true;
            }else{
                return false;
            }
        }
        public function getBlogById($id){
            $this->db->where('id',$id);
            $query = $this->db->get('blog-user');
            if($query->num_rows() > 0){
                return $query->row();
            }else{
                return false;
            }
            
        }
        public function update(){
            $id = $this->input->post('txt_hidden');
            $field = array(
                'title'=>$this->input->post('txt_title'),
                'description'=>$this->input->post('txt_description'),
                'updated_at'=>date('Y-m-d H:i:s')
            );
            $this->db->where('id', $id);
            $this->db->update('blog-user',$field);
            if($this->db->affected_rows() > 0){
                return true;
            }else{
                return false;
            }
        }
        public function delete($id){
            $this->db->where('id',$id);
            $this->db->delete('blog-user');
            if($this->db->affected_rows() > 0){
                return true;
            }else{
                return false;
            }


        }

        }
    


?>