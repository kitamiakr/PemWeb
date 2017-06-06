<?php defined('BASEPATH') OR exit('No direct script access allowed');
class My_lib {
	protected $CI;

	function __construct()
	{		
		$this->CI=& get_instance();
		$this->CI->load->database();
	}

	function noTable(){
		die('Gunakan nama table terlebih dahulu pada parameter');
	}

	function add_row($table,$data=array()){

		if(empty($table)){
			$this->noTable();
		}else{
			if(!empty($data))
			{
				$this->CI->db->insert($table,$data);
				if($this->CI->db->affected_rows()>0){
					return true;
				}else{
					return false;
				}
			}else{
				return false;
			}
		}
	}

	function edit_row($table,$data=array(),$where=array()){
		if(empty($table)){
			$this->noTable();
		}else{
			if(!empty($where)){
				$this->CI->db->where($where);
			}
			
			if(!empty($data))
			{
				$this->CI->db->update($table,$data);
				if($this->CI->db->affected_rows()>-1){
					return true;
				}else{
					return false;
				}
			}else{
				return false;
			}
		}
	}

	function delete_row($table,$where=array()){
		if(empty($table)){
			$this->noTable();
		}else{
			if(!empty($where)){
				$this->CI->db->where($where);
			}

			$this->CI->db->delete($table);
			if($this->CI->db->affected_rows() > 0){
				return true;
			}else{
				return false;
			}

		}
	}

	function row_count($table,$where=array()){
		if(empty($table)){
			$this->noTable();
		}else{
			if(!empty($where)){
				$this->CI->db->where($where);
			}
			$sql = $this->CI->db->get($table);
			$count=$sql->num_rows();
			return $count;
		}
	}

	function jum_kepsek($where=array()) {
		$this->CI->db->select("*");
		$this->CI->db->from("kepsek");
		$this->CI->db->join("profil","kepsek.npsn=profil.npsn");
		$this->CI->db->where($where);
		$sql = $this->CI->db->get();
		$count = $sql->num_rows();
		return $count;
	}

	function get_row($table,$where=array(),$field,$order=array()){
		if(empty($table)){
			$this->noTable();
		}else{
			if(!empty($order)){
				$this->CI->db->order_by($order);
			}
			if(!empty($where)){
				$this->CI->db->where($where);
			}
			$sql = $this->CI->db->get($table);
			if($sql->num_rows() > 0){
				return $sql->row()->$field;
			} else {
				return "";
			}
		}
	}

	function get_sum_row($table,$where=array(),$field){
		if(empty($table)){
			$this->noTable();
		}else{
			if(!empty($where)){
				$this->CI->db->where($where);
			}
			$this->CI->db->select_sum($field);
			$sql = $this->CI->db->get($table);
			if($sql->num_rows() > 0){
				return $sql->row()->$field;
			} else {
				return 0;
			}
		}
	}

	function get_data($table,$where=array(),$order='',$group='',$limit=null,$start=null){


		if(!empty($table))	{
			if(!empty($where)){
				$this->CI->db->where($where);
			}

			if(!empty($order)){
				$this->CI->db->order_by($order);
			}

			if(!empty($group)){
				$this->CI->db->group_by($group);
			}

			if(!empty($limit)){
				$this->CI->db->limit($limit,$start);
			}

			$result=$this->CI->db->get($table);
			if($result->num_rows() > 0){
				return $result->result();
			}else{
				return null;
			}
		}else{
			$this->noTable();
		}
	}

	function cek($table,$where=array()){
		if(empty($table)){
			$this->noTable();
		}else{
			if(!empty($where)){
				$this->CI->db->where($where);
			}
			
			$sql = $this->CI->db->get($table);
			if($sql->num_rows() > 0){
				return false;
			} else {
				return true;
			}
		}
	}
}