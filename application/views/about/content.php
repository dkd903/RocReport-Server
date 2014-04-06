<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">

		<title>About | RocReport</title>

		<!-- Bootstrap core CSS -->
		<link href="<?=base_url(); ?>static/css/bootstrap.min.css" rel="stylesheet">

		<!-- Custom styles for this template -->
		<link href="<?=base_url(); ?>static/css/about.css" rel="stylesheet">
		<link href="<?=base_url(); ?>static/css/jquery.fullPage.css" rel="stylesheet">

		<link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700,300italic,400italic,500italic,700italic' rel='stylesheet' type='text/css'>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/smoothness/jquery-ui.css" />
		<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
		<script src="<?=base_url(); ?>static/js/bootstrap.min.js"></script>
		<script src="<?=base_url(); ?>static/js/jquery.fullPage.js"></script>
	</head>
	<body>
		<div class="section" id="about">
			<div class="content">
				<h1>RocReport</h1>
				<p>This will be a description about rocreport. This will be a description about rocreport. This will be a description about rocreport.</p>
				<img src="<?=base_url();?>static/images/qr-website.png" width="300">
			</div>
		</div>
		<div class="section" id="get">
			<div class="content">
				<h1>Get It</h1>
				<div class="row">
					<div class="col-md-6">
						<h3>Android</h3>
						<p><img src="<?=base_url();?>static/images/qr-apk.png" width="200"></p>
					</div>
					<div class="col-md-6">
						<h3>iOS</h3>
						<p><img src="<?=base_url();?>static/images/qr-website.png" width="200"></p>
					</div>
				</div>
			</div>
		</div>
		<div class="section" id="contact">
			<div class="content">
				<h1>Contact</h1>
				<div class="row">
					<div class="col-md-6">
						<h3>Ricky Laishram</h3>
						<p><a href="mailto:rickylaishram@gmail.com">Email</a></p>
					</div>
					<div class="col-md-6">
						<h3>Debjit Saha</h3>
						<p><a href="mailto:debjitsaha87@gmail.com">Email</a></p>
					</div>
				</div>
			</div>
		</div>
		<div class="section" id="developer">
			<div class="content">
				<h1>For Developer</h1>
				<h3>Source Code</h3>
				<p><a href="https://github.com/rickylaishram/RocReport-Server">Website</a></p>
				<p><a href="https://github.com/rickylaishram/RocReport-Android">Android</a></p>
				<p><a href="https://github.com/dkd903/RocReport-ios">iOS</a></p>
				<h3>API</h3>
				<p><a href="https://github.com/rickylaishram/RocReport-Server/blob/master/api-documentation.md">Documentation</a></p>
				<p></p>
			</div>
		</div>
	</body>
	<script type="text/javascript">
		$(document).ready(function(){
			$.fn.fullpage();
		});
	</script>
</html>