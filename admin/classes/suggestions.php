<?php  

	class Suggestions
	{

		public static function getSuggestion($id){
			return Config::selectData(
				"SELECT * FROM `Suggestion` WHERE `id`=:id AND is_deleted=0",
				array('id'=>$id)
			);
		}

		public static function getallSuggestions(){
			$Suggestions = Config::selectMultiData(
				"SELECT S.*FROM `Suggestion` S 
				WHERE S.`is_deleted`=0",NULL
			);
			return $Suggestions->fetchAll();
		}  
		
				public static function getallSuggestionsMRE(){
			$Suggestions = Config::selectMultiData(
				"SELECT S.*FROM `SuggestionMRE` S 
				WHERE S.`is_deleted`=0",NULL
			);
			return $Suggestions->fetchAll();
		}  

		public static function addSuggestion() {
			
			if(isset($_POST['proposeur']) && !empty($_POST['proposeur']) && isset($_POST['nom_ar']) && !empty($_POST['nom_ar']) && isset($_POST['prenom_ar']) && !empty($_POST['prenom_ar']) ){

				$proposeur = $_POST['proposeur']; 
                $intitule = $_POST['intitule']; 
                $nom_ar = $_POST['nom_ar']; 
                $prenom_ar = $_POST['prenom_ar'];
                $telephone = $_POST['telephone']; 
                $email = $_POST['email']; 
                $description = $_POST['description']; 

                $erreurExtension = false; 
                $piece_jointe = NULL;
                $max_id = 1;

                $requete = Config::selectData("SELECT MAX(id) as max_id FROM `suggestion`", NULL);

                if(!empty($requete)) { $max_id = ($requete->max_id)+1;}


                // ********* Upload file : file ************* 
                if(!empty($_FILES["piece_jointe"]["name"])){  

                  $nomFichier='PJ_'.$max_id.'-'.rand(1,10000000);
                  
                  //nom temporaire sur le serveur:
                  $nomTemporaireFichier = $_FILES["piece_jointe"]["tmp_name"];
                  //type de de ficheir choisi:
                  $typeFichier   = $_FILES["piece_jointe"]["type"];
                  //poids en octets de l'image choisi:
                  $poidsFichier  = $_FILES["piece_jointe"]["size"];
                  //code de l'erreur si jamais il y en a une:
                  $codeErreur    = $_FILES["piece_jointe"]["error"];
                  //chemin de dossier des images:
                  $chemin_certificat= "uploads/";
              
                  // type du fichier
                  $extensions = array('.pdf', '.PDF', '.docx', '.DOCX', '.jpg', '.JPG', '.jpeg', '.JPEG', '.png', '.PNG', '.rar', '.RAR', '.zip', '.ZIP');
                  $extension = strrchr($_FILES['piece_jointe']['name'], '.');
                  // taille du fichier en octets
                  $taille = filesize($_FILES['piece_jointe']['tmp_name']);
              
                  if(!in_array($extension, $extensions)){ 
                    //throw new Exception("خطأ", 1);
                    $erreurExtension=true; 
                  }
                  else if (preg_match('/.pdf/',strtolower($nomFichier.$extension))==1 || preg_match('/.docx/',strtolower($nomFichier.$extension))==1 || preg_match('/.jpg/',strtolower($nomFichier.$extension))==1 || preg_match('/.jpeg/',strtolower($nomFichier.$extension))==1 || preg_match('/.png/',strtolower($nomFichier.$extension))==1 || preg_match('/.rar/',strtolower($nomFichier.$extension))==1 || preg_match('/.zip/',strtolower($nomFichier.$extension))==1){
                    if( copy($nomTemporaireFichier,$chemin_certificat.$nomFichier.$extension))
                      $piece_jointe=addslashes($nomFichier.$extension);
                  }
                  else{ //Format de fichier incorret 
                    //throw new Exception("خطأ", 1);
                    $erreurExtension=true;
                  }
                }

                if ($erreurExtension==false) {
                
                  $query = "INSERT INTO `suggestion`(`proposeur`, `intitule`, `nom_ar`, `prenom_ar`, `telephone`, `email`, `description`, `piece_jointe`) 
                  VALUES(:proposeur, :intitule, :nom_ar, :prenom_ar, :telephone, :email, :description, :piece_jointe)";

                  $params = array(
                    'proposeur'=>$proposeur, 
                    'intitule'=>$intitule, 
                    'nom_ar'=>$nom_ar, 
                    'prenom_ar'=>$prenom_ar, 
                    'telephone'=>$telephone, 
                    'email'=>$email, 
                    'description'=>$description, 
                    'piece_jointe'=>$piece_jointe
                  ); 

					$returned_id = Config::insertData($query, $params); 

					if($returned_id > 0){ 
						return $returned_id;
				    }
				    else{
				    	return -1;
				    } 
					
				}
				else{
			    	return 0;
			    } 
			}

		}

	}


?>