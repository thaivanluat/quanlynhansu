<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class nhansu_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function insert($name,$birthday,$phone,$image,$orderfinished)
	{
		$dulieu = array(
			'name' =>$name,
			'birthday' =>$birthday,
			'phone' =>$phone,
			'image' =>$image,
			'orderfinished' =>$orderfinished
		);
		$this->db->insert('staff',$dulieu);
		return $this->db->insert_id();
	}


	public function getalldata()
	{	
		$this->db->select("*");
		$this->db->order_by('id','asc');
		$dulieu = $this->db->get('staff');
		$dulieu = $dulieu->result_array();
		return $dulieu;
	}


	public function getdatabyid($id)
	{
		$this->db->select('*');
		$this->db->where('id', $id);
		$dulieu = $this->db->get('staff');
		$dulieu = $dulieu->result_array();
		return $dulieu;
	}

	public function updatebyid($id,$name,$birthday,$phone,$image,$orderfinished)
	{
		$mangdulieu = array(
			'id' => $id,
			'name' => $name,
			'birthday' => $birthday,
			'phone' => $phone,
			'image' => $image,
			'orderfinished' => $orderfinished
		);
		$this->db->where('id', $id);
		return $this->db->update('staff', $mangdulieu);

	}

	public function removedatabyid($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete('staff');
	}

}

/* End of file nhansu_model.php */
/* Location: ./application/models/nhansu_model.php */