<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include 'UploadHandler.php';

class nhansu extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->model('nhansu_model');
		$ketqua = $this->nhansu_model->getalldata();
		$ketqua = array('mangketqua' => $ketqua);
		$this->load->view('nhansu_view', $ketqua);
		
	}

	public function nhansu_add()
	{
		//lay du lieu tu view

		$target_dir = "fileupload/";
		$target_file = $target_dir . basename($_FILES["image"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
		    $check = getimagesize($_FILES["image"]["tmp_name"]);
		    if($check !== false) {
		        echo "File is an image - " . $check["mime"] . ".";
		        $uploadOk = 1;
		    } else {
		        echo "File is not an image.";
		        $uploadOk = 0;
		    }
		}
		// Check if file already exists
		if (file_exists($target_file)) {
		    echo "Sorry, file already exists.";
		    $uploadOk = 0;
		}
		// Check file size
		if ($_FILES["image"]["size"] > 500000) {
		    echo "Sorry, your file is too large.";
		    $uploadOk = 0;
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		    $uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		    echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
		    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
		     //   echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
		    } else {
		        echo "Sorry, there was an error uploading your file.";
		    }
		}

		/*echo "ten la :$name,ngay sinh: $birthday, dien thoai: $phone, don hang: $orderfinished <br>";
		
		echo "<hr>";*/

		$name=$this->input->post('name');
		$birthday=$this->input->post('birthday');
		$phone=$this->input->post('phone');
		$orderfinished=$this->input->post('orderfinished');
		$image = base_url()."fileupload/".basename($_FILES["image"]["name"]);

		//call model

		$this->load->model('nhansu_model');
		$trangthai = $this->nhansu_model->insert($name,$birthday,$phone,$image,$orderfinished); 
		if($trangthai)
		{
			//echo 'insert thanh cong';	
			$this->load->view('insertsuccess_view.php');
		}
		else
		{
			echo 'insert that bai';
		}


	}

	public function nhansu_edit($id)
	{
		$this->load->model('nhansu_model');
		$ketqua = $this->nhansu_model->getdatabyid($id);
		$ketqua = array('dulieukq' => $ketqua);
		$this->load->view('editnhansu_view', $ketqua);

	}

	public function nhansu_delete($id)
	{
		$this->load->model('nhansu_model');

		if($this->nhansu_model->removedatabyid($id))
		{
			$this->load->view('deletesuccess_view');
		}
		else {
			echo 'Xoa khong thanh cong';
		}
	}


	public function nhansu_update()
	{
		$id = $this->input->post('id');
		$name = $this->input->post('name');
		$birthday = $this->input->post('birthday');		
		$phone= $this->input->post('phone');
		$orderfinished = $this->input->post('orderfinished');

		//xu ly upload anh
		$target_dir = "fileupload/";
		$target_file = $target_dir . basename($_FILES["image"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
		    $check = getimagesize($_FILES["image"]["tmp_name"]);
		    if($check !== false) {
		        echo "File is an image - " . $check["mime"] . ".";
		        $uploadOk = 1;
		    } else {
		        echo "File is not an image.";
		        $uploadOk = 0;
		    }
		}
		// Check if file already exists
		if (file_exists($target_file)) {
		    //echo "Sorry, file already exists.";
		    $uploadOk = 0;
		}
		// Check file size
		if ($_FILES["image"]["size"] > 500000) {
		    //echo "Sorry, your file is too large.";
		    $uploadOk = 0;
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		    //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		    $uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		    //echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
		    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
		     //   echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
		    } else {
		        //echo "Sorry, there was an error uploading your file.";
		    }
		}

		$image = basename($_FILES["image"]["name"]);

		/*kiem tra dieu kien , neu co upload anh thi lay 
		neu khong upload anh thi lay anh cu*/
		if($image)
		{
			$image = base_url()."fileupload/".basename($_FILES["image"]["name"]);;
		}
		else
		{
			$image = $this->input->post('image2');
			
		}
		
		$this->load->model('nhansu_model');
		if($this->nhansu_model->updatebyid($id,$name,$birthday,$phone,$image,$orderfinished))
		{
			$this->load->view('insertsuccess_view');
		}
		else {
			echo 'khong thanh cong';
		}
		
	}

	public function ajaxadd()
	{
		$target_dir = "fileupload/";
		$target_file = $target_dir . basename($_FILES["image"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
		    $check = getimagesize($_FILES["image"]["tmp_name"]);
		    if($check !== false) {
		        echo "File is an image - " . $check["mime"] . ".";
		        $uploadOk = 1;
		    } else {
		        echo "File is not an image.";
		        $uploadOk = 0;
		    }
		}
		// Check if file already exists
		if (file_exists($target_file)) {
		    echo "Sorry, file already exists.";
		    $uploadOk = 0;
		}
		// Check file size
		if ($_FILES["image"]["size"] > 500000) {
		    echo "Sorry, your file is too large.";
		    $uploadOk = 0;
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		    $uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		    echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
		    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
		     //   echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
		    } else {
		        echo "Sorry, there was an error uploading your file.";
		    }
		}


		$name = $this->input->post('name');
		$birthday = $this->input->post('birthday');		
		$phone= $this->input->post('phone');
		$orderfinished = $this->input->post('orderfinished');

		$image = $this->input->post('image');
		
		$this->load->model('nhansu_model');
		$trangthai = $this->nhansu_model->insert($name,$birthday,$phone,$image,$orderfinished);
		if($trangthai)
		{
			echo "thanh cong";
		}
		else {
			echo "loi";
		}
	}


	public function uploadfile()
	{
		$uploadfile = new UploadHandler();
		
		
	}




}

/* End of file nhansu.php */
/* Location: ./application/controllers/nhansu.php */