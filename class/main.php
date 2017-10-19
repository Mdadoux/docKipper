<?php

class Main  
{
  
// lister les documents issu dans un dossier 
  public function lisFilesFromFolder($folder)
  {
    if(is_dir($folder)){
      if($dh= opendir($folder)){     
        while($file = readdir($dh)){
          if(!in_array($file,array("..",".","stats"))){?>          
            <div class="media doc_items">
                <div class="media-left media-middle">
                <a href="#">
                  <img class="media-object" src="img/file_icons/<?php echo($this->getextension($file)) ;?>" width="100" alt="...">
                </a>
                </div>
                <div class="media-body">
                  <h4 class="media-heading"><a href="index.php?archive=<?php echo $file;?>"><?php echo $file;?></a> </h4>
                  <p class="post-meta">
                    Posté le : <?php echo date("d/m/Y à H:i:s",filemtime($folder.$file)) ;?> <br><br>
                    <strong>Télechargé (<?php 
                        $explodedFile = explode(".", $file);
                        // afficher le nombre de téléchargement par défaut à 0
                        echo ($this->get_numberHit($explodedFile[0]));

                      ?>) fois</strong>

                  </p> 
                  <!--<p>Cras sit amet nibh libero, in gravida nulla.Nulla vel metus.</p>!-->
                </div>
              </div>        

        <?php } 
          
        }
        closedir($dh);
      }
      
    }
    
  }

  //trouver l'image correspondant 
  private function getextension($fileNameExtension)
  {
    $nameFile = explode(".",$fileNameExtension);
    $ext = $nameFile[1];
    //dossier des icones 
    $iconDir = "img/file_icons/";
    if(is_dir($iconDir)){
      if($path = opendir($iconDir)){        
        while($fichier = readdir($path)){
            if(!in_array($fichier,array(".",".."))){              
              $icon = explode(".",$fichier);

              $iconName = $icon[0];

              if($ext === $iconName){
                $fichier = implode('.',$icon);
              
                  return $fichier;
              }

            }
        
        }
      }
    }
  }

public function getNbDoc($number)
{
  return $this->countDocs($number);
}

// compter le nombre de fichier 
private function countDocs($name)
 {
    if(is_dir($name)){

      if($pathName = opendir($name)){
          $compteur = 0;
         while($file= readdir($pathName)){

           if(!in_array($file, array(".","..","stats"))){
            $compteur++; 
           }

        }
      }
      closedir($pathName);
    }
    return $compteur; 
}

//afficher le nombre de hit

private function get_numberHit($name)
 {
        $folder_stat = 'uploaded/stats/'; // répertoire dans lequel seront stockées les statistiques
        $file = $folder_stat.$name.'.txt'; // nom du fichier de statistiques contenant le nombre de hits
        // si le fichier existe
        if (file_exists($file)) {
            $handle  = fopen( $file , 'r' ); // ouverture du fichier        
            $hit = fgets($handle); // Récupère la ligne courante sur laquelle se trouve le pointeur du fichier
            fclose( $handle); // fermeture du fichier                
            return $hit; // retour de la valeur de $hit
        }// si le fichier n’existe pas
        else {
            touch( $file ); // création du fichier                
            $handle  = fopen( $file  , 'r+' ); // Ouverture en lecture et écriture, et place le pointeur de fichier au début du fichier.
            fseek( $handle , 0 ); // réinitialisation du curseur
            fputs( $handle , 0 ); // écriture dans le fichier                
            fclose( $handle ); // fermeture du fichier
        }
}

public function downLoadFile()
{
  // tester si un fichier est demandé pour téléchargement 
  if (isset($_GET["archive"])) {
    $folder_stat = 'uploaded/stats/'; // répertoire dans lequel seront stockées les statistiques
    $folderToArchive = 'uploaded/';
    $theArchive = htmlentities($_GET["archive"],ENT_QUOTES);
    $explodeArchive = explode('.', $theArchive);
    $file = $folder_stat.$explodeArchive[0].'.txt'; // nom du fichier de statistiques contenant le nombre de hits 
    if(file_exists($file)){
        $myhandle = fopen($file, "r+");
        $hit = fgets($myhandle);
        $hit = intval($hit);
        $hit = $hit + 1;
        fseek($myhandle,0);
        fwrite($myhandle,$hit);
        fclose($myhandle);      
        header("Location:$folderToArchive".$explodeArchive[0].".".$explodeArchive[1]);

      }
    }
}

public function uploadFile()
{
    if(!empty($_FILES['document'])){
      global $error;
      global $success;
      $pathToUpload = "uploaded/";
      $uploadOk = 1;
      $documentName = $_FILES['document']['name'];
      //$file_size = $_FILES['image']['size'];
      $documentTempRep = $_FILES['document']['tmp_name'];
      $documentType = $_FILES['document']['type'];
      // $imageFileType = pathinfo($pathToUpload,PATHINFO_EXTENSION);
      $documentExtens=strrchr($_FILES['document']['name'],'.');
      $extensionAllowed= array(".jpeg",".jpg",".png",".pdf",".doc",".docx",".xlsx",".rar",".zip",".txt",".java");
      $fichier= basename($_FILES['document']['name']);
      // tester si un fichier existe djaà dans le dossier 
        if(file_exists($pathToUpload.$documentName)) {
          $error = "Un fichier du même non existe d'éjà";
          $uploadOk = 0;
        }
        if ($_FILES["document"]["size"] > 20000000000) {
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
            $error = $_FILES['document']['error'];
            
          }

        }
    }

}





}

