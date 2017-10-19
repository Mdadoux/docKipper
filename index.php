<?php
  require_once('main.php');
  is_doc();
  is_archive();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>Formation sogeti</title>
	<!-- Bootstrap core CSS -->
	<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<!-- Custom fonts for this template -->
	<link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
	<!-- Custom styles for this template -->
	<link href="css/clean-blog.css" rel="stylesheet">
</head>
<body>
<!-- Navigation -->
<!-- Page Header -->
<header class="masthead" style="background-image: url('img/home-bg.jpg')">
	<div class="container">
		<div class="row">
				<div class="col-lg-8 col-md-10 mx-auto">
					<div class="site-heading">
						<h1>Espace Doc</h1>
						<span class="subheading">Platforme de partage de fichiers</span>
					</div>
				</div>
		</div>
	</div>
</header>

<a href="#" id="scrollToTop"><i class="fa fa-arrow-up" aria-hidden="true"></i></a>

<!-- Main Content -->
<section id="docListing">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-10 mx-auto">
					<div class="post-preview">
						<h2 class="page_heading">Documents disponibles <span class="text-info"><?php echo countDocs('uploaded/');?></span></h2>
						<?php  lisFilesFromFolder("uploaded/");?>	
						<!-- Pager -->
						<div class="clearfix">
						<?php	//<a class="btn btn-secondary float-right" href="#">Older Posts &rarr;</a> ;?>
					</div>
				</div>
			</div>
			<a href="index.php?section=add" class=" btn-addDoc"><i class="fa fa-plus" aria-hidden="true"></i></a>
		</div> <!-- fin du container!-->
	</section>


	<?php if(isset($_GET['section'])) : ?>

	<section id="addArea">
		<a href="index.php" id="close">Acceuil</a>
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-10 mx-auto">
				<div class="post-preview">
				<h2 class="page_heading">Télecharger un document </h2>
				<form enctype="multipart/form-data" method="POST" action="">
					<div class="messagesAlert">
						<?php 
						// afficher ereur 	
						if(isset($error)){
						echo "<span class='text-danger'>$error</span>"; 
						}
						if(isset($success)){echo "<span class='text-success'>$success</span>"; }

						?>

		</div>

			<?php /*
			<div class="control-group">

			<div class="form-group floating-label-form-group controls">

			<label>Nom fichier</label>

			<input type="text" class="form-control" placeholder="Name" id="name">

			<p class="help-block text-danger"></p>

			</div>

			</div>



			<div class="control-group">

			<div class="form-group floating-label-form-group controls">

			<label>Votre nom ou email</label>

			<input type="email" class="form-control" placeholder="Email Address" id="email">

			<p class="help-block text-danger"></p>

			</div>

			</div>


			<div class="control-group">

			<div class="form-group floating-label-form-group controls">

			<label>Brève description</label>

			<textarea rows="5" class="form-control" placeholder="Message" id="message" ></textarea>


			</div>

			</div>
			*/?>
			<br> 

				<div class="form-group">
					<input type="file" name="document" id="document" >
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-secondary" id="sendMessageButton">Send</button>
				</div>
			</form> <!--!-->
		</div> <!-- fin du container!-->
</section>
<?php endif; ?>


<!-- Footer -->

<footer>

		<div class="container">

		<div class="row">

		<div class="col-lg-8 col-md-10 mx-auto">

		<ul class="list-inline text-center">

		<li class="list-inline-item">

		

		</li>


		</ul>

		<p class="copyright text-muted">By dadoux</p>

		</div>

		</div>

		</div>

</footer>



<!-- Bootstrap core JavaScript -->

<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/popper/popper.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!-- Custom scripts for this template -->
<script src="js/clean-blog.js"></script>



</body>



</html>