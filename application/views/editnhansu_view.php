<!DOCTYPE html>
<html lang="en">
<head>
	<title> Sua nhan vien </title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">  
	<script type="text/javascript" src="<?php echo base_url();?>vendor/bootstrap.js"></script>
	 	<script type="text/javascript" src="<?php echo base_url();?>1.js"></script>
	<link rel="stylesheet" href="<?php echo base_url();?>vendor/bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url();?>vendor/font-awesome.css">
	 <link rel="stylesheet" href="<?php echo base_url();?>1.css">

 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
 	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
 	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
 	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
</head>
<body>
	
		<div class="container">
			<div class="text-xs-center">
				<h3 class="display-3">Sua nhan su</h3>
			</div>
		</div>

		
			<form method="POST" enctype="multipart/form-data" action="<?= base_url() ?>/index.php/nhansu/nhansu_update">	


				<?php foreach ($dulieukq as $value): ?>
			
				<div class="form-group row">
					<div class="col-sm-6">
						<div class="row">
							<label for="name" class="col-sm-4 form-control-label text-xs-right">Ten: </label>
							<div class="col-sm-8">
								<input  name="name" type="text" class="form-control" id="name" placeholder="Ten" value="<?php echo $value['name']?>">
							</div>
						</div>
					</div>

					<div class="col-sm-6">
						<div class="row">
							<label for="image" class="col-sm-4 form-control-label text-xs-right">Ảnh đại diện: </label>
							<div class="col-sm-8">
								<div class="row">
									<div class="col-sm-6">
										<img src="<?php echo $value['image']?>" alt="" class="img-fluid">
									</div>
								</div>
								<input type="hidden" name="id" value="<?php echo $value['id']?>">
								<input type="hidden" name="image2" value="<?php echo $value['image']?>">
								<input  name="image" type="file" class="form-control" id="image" placeholder="Upload anh">
							</div>
						</div>
					</div>
	
					
				</div>

				<div class="form-group row">

					<div class="col-sm-6">
						<div class="row">
							<label for="birthday" class="col-sm-4 form-control-label text-xs-right">Ngay sinh: </label>
							<div class="col-sm-8">
								<input  name="birthday" type="date" class="form-control" id="birthday" placeholder="Ngay sinh" value="<?php echo $value['birthday']?>">
							</div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="row">
							<label for="phone" class="col-sm-4 form-control-label text-xs-right">So dien thoai: </label>
							<div class="col-sm-8">
								<input  name="phone" type="text" class="form-control" id="phone" placeholder="So dien thoai" value="<?php echo $value['phone']?>">
							</div>
						</div>
					</div>				
				</div>
				
				<div class="form-group row">
					<div class="col-sm-6">
						<div class="row">
							<label for="orderfinished" class="col-sm-4 form-control-label text-xs-right">So don hang:  </label>
							<div class="col-sm-8">
								<input  name="orderfinished" type="number" class="form-control" id="orderfinished" placeholder="So don hang" value="<?php echo $value['orderfinished']?>">
							</div>
						</div>
					</div>
				</div>


				<?php endforeach ?>
				
				<div class="form-group row">
					<div class="col-sm-offset-2 col-sm-10 text-xs-center">
						<button type="submit" class="btn btn-outline-success">Save</button>
						
					</div>
				</div>
			</form>
		
	
 
</body>
</html>