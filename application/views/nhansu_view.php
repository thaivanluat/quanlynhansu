<!DOCTYPE html>
<html lang="en">
<head>
	<title> Giao dien hien thi danh sach nhan su </title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">  
	<script type="text/javascript" src="<?php echo base_url();?>vendor/bootstrap.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>1.js"></script>
	<!-- jquery upload -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js" integrity="sha384-xBuQ/xzmlsLoJpyjoggmTEz8OWUFM0/RC5BsqQBDX2v5cMvDHcMakNTNrHIW2I5f" crossorigin="anonymous"></script>
	 
	<script type="text/javascript" src="<?php echo base_url();?>jqueryupload/js/vendor/jquery.ui.widget.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>jqueryupload/js/jquery.iframe-transport.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>jqueryupload/js/jquery.fileupload.js"></script>
		

<link rel="stylesheet" href="<?php echo base_url();?>vendor/bootstrap.css">
<link rel="stylesheet" href="<?php echo base_url();?>vendor/font-awesome.css">
 <link rel="stylesheet" href="<?php echo base_url();?>1.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
 
 	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
 	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>	
</head>
<body>
	<div class="container">
		<div class="text-xs-center">
			<h3 class="display-3">Danh sach nhan su</h3>

		</div>
	</div>
	<div class="container">
		<div class="row">
			
		<div class="card-deck-wrapper">
			<div class="card-deck">		
				<?php foreach ($mangketqua as $value): ?>
				<div class="col-sm-4 ">

					<div class="card">
						<img class="card-top-img img-fluid" style="display: block;" src="<?php echo $value['image'] ?>" alt="Responsive image">
						<div class="card-block">
							<h4 class="card-title name"><?php echo $value['name'] ?></h4>
							<p class="card-text birthday">Ngay sinh: <b><?php echo $value['birthday'] ?></b></p>
							<p class="card-text phone">Phone: <b><?php echo $value['phone'] ?></b></p>
							<p class="card-text orderfinished"></a>So don hang da hoan thanh: <?php echo $value['orderfinished'] ?></p>
							<p class="card-text edit">
								<small><a href="<?php echo base_url()?>/index.php/nhansu/nhansu_edit/<?php echo $value['id']?>" class="btn btn-warning btn-xs">Edit <i class="fa fa-pencil"></i></a></small>
								<small><a href="<?php echo base_url()?>/index.php/nhansu/nhansu_delete/<?php echo $value['id']?>" class="btn btn-outline-danger btn-xs">Delete <i class="fa fa-remove"></i></a></small>
							</p>
						</div>
					</div>
				</div>
				<?php endforeach; ?>
			
			</div>
		</div>

				
		</div>
	</div>

		<div class="container">
			<div class="text-xs-center">
				<h3 class="display-3">Them moi nhan su</h3>
			</div>
		</div>

		
			 
				<div class="form-group row">
					<div class="col-sm-6">
						<div class="row">
							<label for="name" class="col-sm-4 form-control-label text-xs-right">Ten: </label>
							<div class="col-sm-8">
								<input  name="name" type="text" class="form-control" id="name" placeholder="Ten">
							</div>
						</div>
					</div>
			
					<div class="col-sm-6">
						<div class="row">
							<label for="image" class="col-sm-4 form-control-label text-xs-right">Ảnh đại diện: </label>
							<div class="col-sm-8">
								<input  name="files[]" type="file" class="form-control" id="image" placeholder="Upload anh">
							</div>
						</div>
					</div>
				
					
				</div>
			
				<div class="form-group row">
			
					<div class="col-sm-6">
						<div class="row">
							<label for="birthday" class="col-sm-4 form-control-label text-xs-right">Ngay sinh: </label>
							<div class="col-sm-8">
								<input  name="birthday" type="date" class="form-control" id="birthday" placeholder="Ngay sinh">
							</div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="row">
							<label for="phone" class="col-sm-4 form-control-label text-xs-right">So dien thoai: </label>
							<div class="col-sm-8">
								<input  name="phone" type="text" class="form-control" id="phone" placeholder="So dien thoai">
							</div>
						</div>
					</div>				
				</div>
				
				<div class="form-group row">
					<div class="col-sm-6">
						<div class="row">
							<label for="orderfinished" class="col-sm-4 form-control-label text-xs-right">So don hang:  </label>
							<div class="col-sm-8">
								<input  name="orderfinished" type="number" class="form-control" id="orderfinished" placeholder="So don hang">
							</div>
						</div>
					</div>
				</div>
				
				<div class="form-group row">
					<div class="col-sm-offset-2 col-sm-10 text-xs-center">
						<button type="button" class="btn btn-outline-success nutxulyajax">Them moi(ajax)</button>
						<button type="reset" class="btn btn-outline-danger">Dat lai</button>
					</div>
				</div>
			
			
		
	<script>
	duongdan = '<?php echo base_url() ?>';

	$('#image').fileupload({
        url: duongdan + 'index.php/nhansu/uploadfile',
        dataType: 'json',
        done: function (e, data) {
            $.each(data.result.files, function (index, file) {
              tenfile = file.url;
            });
        }
    })


	$('.nutxulyajax').click(function(event) {
		$.ajax({
			url: 'ajaxadd',
			type: 'POST',
			dataType: 'json',
			data: {
				name: $('#name').val(),
				birthday: $('#birthday').val(),
				phone: $('#phone').val(),
				orderfinished: $('#orderfinished').val(),
				image: tenfile
				


			},
		})
		.done(function() {
			
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
			noidung = '<div class="col-sm-4 ">';
			noidung +='<div class="card">';
			noidung +='<img class="card-top-img img-fluid" style="display: block;" src="'+tenfile+'" alt="Responsive image">';
			noidung +='<div class="card-block">';
			noidung +='<h4 class="card-title name">'+ $('#name').val()+ '</h4>';
			noidung +='<p class="card-text birthday">Ngay sinh: <b>'+ $('#birthday').val()+ '</b></p>';
			noidung +='<p class="card-text phone">Phone: <b>'+ $('#phone').val()+ '</b></p>';
			noidung +='<p class="card-text orderfinished"></a>So don hang da hoan thanh: '+ $('#orderfinished').val()+ '</p>';
			noidung +='<p class="card-text edit">';
			noidung +='<small><a href="<?php echo base_url()?>/index.php/nhansu/nhansu_edit/<?php echo $value['id']?>" class="btn btn-warning btn-xs">Edit <i class="fa fa-pencil"></i></a></small>';
			noidung +='<small><a href="<?php echo base_url()?>/index.php/nhansu/nhansu_delete/<?php echo $value['id']?>" class="btn btn-outline-danger btn-xs">Delete <i class="fa fa-remove"></i></a></small>';
			noidung +='</p>';
			noidung +='</div>';
			noidung +='</div>';
			noidung +='</div>';
					
			$('.card-deck').append(noidung);

			$('#name').val('');
			$('#birthday').val('');
			$('#phone').val('');
			$('#image').val('');
			$('#orderfinished').val('');


					
		});
		
	});


		
		
	</script>
 
</body>
</html>