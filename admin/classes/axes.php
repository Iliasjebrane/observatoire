<?php  

	class Axes
	{

		public static function getAxe($id){
			return Config::selectData(
				"SELECT * FROM `axe` WHERE `id`=:id AND is_deleted=0",
				array('id'=>$id)
			);
		}

		public static function getallAxes(){
			$axes = Config::selectMultiData(
				"SELECT A.*FROM `axe` A 
				WHERE A.`is_deleted`=0",NULL
			);
			return $axes->fetchAll();
		}

		public static function getSousAxes($axe){
			$sous_axe = Config::selectMultiData(
				"SELECT S.*, A.name_fr as name_axe FROM `sous_axe` S 
				INNER JOIN axe A ON A.id=S.axe
				WHERE S.axe=:axe AND S.`is_deleted`=0 AND A.`is_deleted`=0",
				array(
					'axe'=>$axe
				)
			);
			return $sous_axe->fetchAll();
		}

		public static function getallSousAxes(){
			$sous_axe = Config::selectMultiData(
				"SELECT S.*, A.`name_ar` as name_axe FROM sous_axe as S
                INNER JOIN axe A ON A.`id`=S.`axe`
                WHERE A.`is_deleted`=0 AND S.`is_deleted`=0 ORDER BY S.`id` ASC",NULL
			);
			return $sous_axe->fetchAll();
		} 

		public static function getallProSol(){
			$sous_axe = Config::selectMultiData(
				"SELECT PS.*, S.`objet_ar` as objet_ar, A.`name_ar` as name_axe FROM proposition_solution as PS
				INNER JOIN sous_axe S ON S.`id`=PS.`sous_axe`
                INNER JOIN axe A ON A.`id`=S.`axe`
                WHERE A.`is_deleted`=0 AND S.`is_deleted`=0 AND PS.`is_deleted`=0 ORDER BY PS.`id` ASC",NULL
			);
			return $sous_axe->fetchAll();
		}

		public static function addProSol() {
			if(isset($_POST['sous_axe']) && !empty($_POST['sous_axe']) && isset($_POST['probleme_ar']) && !empty($_POST['probleme_ar']) && isset($_POST['solution_ar']) && !empty($_POST['solution_ar']) ){

				$sous_axe = $_POST['sous_axe']; 
				$probleme_ar = $_POST['probleme_ar'];
				$solution_ar = $_POST['solution_ar']; 

				$ipaddress=NULL;
				if (getenv('HTTP_CLIENT_IP'))
				  $ipaddress = getenv('HTTP_CLIENT_IP');
				else if(getenv('HTTP_X_FORWARDED_FOR'))
				  $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
				else if(getenv('HTTP_X_FORWARDED'))
				  $ipaddress = getenv('HTTP_X_FORWARDED');
				else if(getenv('HTTP_FORWARDED_FOR'))
				  $ipaddress = getenv('HTTP_FORWARDED_FOR');
				else if(getenv('HTTP_FORWARDED'))
				  $ipaddress = getenv('HTTP_FORWARDED');
				else if(getenv('REMOTE_ADDR'))
				  $ipaddress = getenv('REMOTE_ADDR');
				else
				  $ipaddress = 'UNKNOWN'; 

				ob_start(); 
				system("ipconfig /all"); 
				$mycom=ob_get_contents(); 
				ob_clean(); 
				$findme = "physique"; 
				$pmac = strpos($mycom, $findme); 
				$mac=substr($mycom,($pmac+33),17); 

				$adresse='IP='.$ipaddress."\nMAC=".$mac;

				$query = "SELECT * FROM `proposition_solution` WHERE `probleme_ar`=:probleme_ar AND `solution_ar`=:solution_ar AND sous_axe=:sous_axe";
				$req = Config::executeData($query, array('probleme_ar'=>$probleme_ar, 'solution_ar'=>$solution_ar, 'sous_axe'=>$sous_axe));

				if ($req==0) {
					$query = "INSERT INTO `proposition_solution`(`probleme_ar`, `solution_ar`, `sous_axe`, `adresse`) VALUES(:probleme_ar, :solution_ar, :sous_axe, :adresse)";

					$params = array(
						'probleme_ar'=>$probleme_ar,
						'solution_ar'=>$solution_ar,
						'sous_axe'=>$sous_axe,
						'adresse'=>$adresse
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