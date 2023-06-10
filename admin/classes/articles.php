<?php 


	class Articles
	{

		public static function getArticle($id){
			return Config::selectData(
				"SELECT * FROM `article` WHERE `id`=:id AND is_published=1",
				array('id'=>$id)
			);
		}

		public static function getArticles($Articles){
			$articles = Config::selectMultiData(
				"SELECT * FROM `article` WHERE `cond`=:cond",
				array(
					'cond'=>$cond
				)
			);
			return $articles->fetchAll();
		}

		public static function addArticle() {
			if(isset($_POST['title_ar']) && !empty($_POST['title_ar']) && isset($_POST['content_ar']) && !empty($_POST['content_ar']) ){

				$title_ar = $_POST['title_ar'];
				$content_ar = $_POST['content_ar']; 


				$query = "SELECT * FROM `article` WHERE `title_ar`=:title_ar AND `content_ar`=:content_ar";
				$req = Config::executeData($query, array('title_ar'=>$title_ar, 'content_ar'=>$content_ar));

				if ($req==0) {
					$query = "INSERT INTO `article`(`title_ar`, `content_ar`) VALUES(:title_ar, :content_ar)";

					$params = array(
						'title_ar'=>$title_ar,
						'content_ar'=>$content_ar
					);

					$returned_id = Config::insertData($query, $params); 
					if($returned_id > 0){  
						return $returned_id;
				    }
				    else{ 
						return 0;
				    }
				}
			    else{ 
					return 0;
			    }

				
			}
		}

		public static function deleteArticles() {
			if(isset($_POST['id']) && $_POST['id']){
				$query = "DELETE `article` WHERE `id`=:id";
				$updated = Config::executeData($query, array('id'=>$_POST['id']));
				return $updated;
			}
			else return -2;
		}

	}


?>