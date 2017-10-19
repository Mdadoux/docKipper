<?php
require_once('main.php');


  if(!empty($_FILES['document'])){
    $pathToUpload = "uploaded/";
    $uploadOk = 1;
    $documentName = $_FILES['document']['name'];
    //$file_size = $_FILES['image']['size'];
    $documentTempRep = $_FILES['document']['tmp_name'];
    $documentType = $_FILES['document']['type'];
    // $imageFileType = pathinfo($pathToUpload,PATHINFO_EXTENSION);

    $documentExtens=strrchr($_FILES['document']['name'],'.');
    $extensionAllowed= array(".jpeg",".jpg",".png",".pdf",".doc",".docx",".xlsx",'.rar','zip');
    $fichier= basename($_FILES['document']['name']);


    // tester si un fichier existe djaà dans le dossier 
      if(file_exists($pathToUpload.$documentName)) {
          $error = "Un fichier du même non existe d'éjà";
          $uploadOk = 0;
      }
      if ($_FILES["document"]["size"] > 50000) {
          $error = "Fichier trop volumineux";
          $uploadOk = 0;
      }  
    // deplacer le fichier télchargé 
    if(!in_array($documentExtens,$extensionAllowed)){
        $error = "Format de fichier non valide !";         
        $uploadOk = 0; // on ne télécharge pas le fichier
      }
        
    if($uploadOk==1){

            if(move_uploaded_file($documentTempRep,$pathToUpload.$documentName)){

                  $success = "Fichier téléchargé avec succès";

            }else{

               $error = "Aucun fichier télécharger";

            }
        }


      
      
    
        
  }
  ?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Clean Blog - Start Bootstrap Theme</title>

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
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand" href="index.html">Formation testing</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <!-- 
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.html">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.html">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="post.html">Sample Post</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.html">Contact</a>
            </li>
          </ul>
        </div>
         -->

      </div>
    </nav>

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

    <!-- Main Content -->
 <section id="docListing">
    <div class="container">
   
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="post-preview">
              <h2 class="page_heading">Documents à télecharger </h2>
          
              <div class="media doc_items">
              <div class="media-left media-middle">
                <a href="#">
                  <img class="media-object" src="img/file_icons/_blank.png" width="100" alt="...">
                </a>
              </div>
              <div class="media-body">
                <h4 class="media-heading"><a href="#">aligned media</a> </h4>
                <p class="post-meta">Posted by
                <a href="#">Start Bootstrap</a>on August 24, 2017 | télechargé (2) fois</p>              
                <p>Cras sit amet nibh libero, in gravida nulla.Nulla vel metus.</p>
              </div>
            </div>
             <div class="media doc_items">
              <div class="media-left media-middle">
                <a href="#">
                  <img class="media-object" src="img/file_icons/pdf.png" width="100" alt="...">
                </a>
              </div>
              <div class="media-body">
                <h4 class="media-heading"><a href="#">aligned media on de the script for none paradise technique_frgemontagouxsy</a> </h4>
                <p class="post-meta">Posted by
                 <a href="#">Start Bootstrap</a>on August 24, 2017 | télechargé (2) fois
               </p>   
                <p>Cras sit amet nibh libero, in gravida nulla.
                  Nulla vel metus.</p>
              </div>


  



            </div>
                  
            

          <!-- Pager -->
          <div class="clearfix">
            <a class="btn btn-secondary float-right" href="#">Older Posts &rarr;</a>
          </div>
        </div>
      </div>
     

         <a href="#" class=" btn-addDoc" data-toggle="modal" data-target="#myModal">
                  Add
            </a>
    </div> <!-- fin du container!-->
 </section>

 

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="page_heading" id="myModalLabel">Ajouter un document</h4>
      </div>
      <div class="modal-body">
        <form enctype="multipart/form-data" method="POST" action="">

          <div class="messagesAlert">
            <?php 
                if(isset($error)){

                   echo "<span class='text-danger'>$error</span>"; 
                  
                }

                if(isset($success)){echo "<span class='text-success'>$success</span>"; }
              ?>
            </div>
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
             <br> 

 

             <div class="form-group">
               <input type="file" name="document" id="document" accept="application/zip">
            </div>
            <br>
            <div id="success"></div>
            <div class="form-group">
              <button type="submit" class="btn btn-secondary" id="sendMessageButton">Send</button>
            </div>
          </form> <!--!-->
      </div> <!-- fin modale body!-->

      
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>


    <!-- Footer -->
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <ul class="list-inline text-center">
              <li class="list-inline-item">
                <?php 
                
               $fiche = list_dir('uploaded/'); 

               var_dump($fiche);

                
                
                 ?>
              </li>
              
            </ul>
            <p class="copyright text-muted">poverd by dadoux</p>
          </div>
        </div>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/clean-blog.min.js"></script>

  </body>

</html>
