<?php 

    class MySql{

        private static $pdo;
        public static function connect(){
            if (self::$pdo == null) {
                try{
                    self::$pdo = new PDO('mysql:host='.HOST.';dbname='.DATABASE,USER,PASSWORD,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
                    self::$pdo -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                }catch(Exception $e){
                    echo "erro ao conectar";
                }
            }

            return self::$pdo;
        }
    }

    class Site{

        public static function updateUserOnline(){
           if(isset($_SESSION['online'])) {
               $token = $_SESSION['online'];
               $horarioAtual = date('Y-m-d H:i:s');
               $check = MySql::connect()->prepare("SELECT `id` FROM `tb_admin.online` WHERE token = ?");
               $check->execute(array($_SESSION['online']));

            if ($check -> rowCount() == 1) {
                $sql = MySql::connect()->prepare("UPDATE `tb_admin.online` SET last_action = ? WHERE token = ?");
                $sql->execute(array($horarioAtual,$token)); 
            }else{
               $ip = $_SERVER['REMOTE_ADDR'];
               $horarioAtual = date('Y-m-d H:i:s');
               $token = $_SESSION['online'];
               $sql = MySql::connect()->prepare("INSERT INTO `tb_admin.online` VALUES(null,?,?,?)");
               $sql -> execute(array($ip,$horarioAtual,$token));
            }
               
           }else{
               $_SESSION['online'] = uniqid();
               $ip = $_SERVER['REMOTE_ADDR'];
               $horarioAtual = date('Y-m-d H:i:s');
               $token = $_SESSION['online'];
               $sql = MySql::connect()->prepare("INSERT INTO `tb_admin.online` VALUES(null,?,?,?)");
               $sql -> execute(array($ip,$horarioAtual,$token));
           }
        }

        public static function count(){
            setcookie('visit', true, time() - 1);
            if (!isset($_COOKIE['visit'])) {
                setcookie('visit', true, time() + (60*60*24*3));
                $sql = MySql::connect() -> prepare("INSERT INTO `tb_admin.visits` VALUES (null,?,?)");
                $sql -> execute(array($_SERVER['REMOTE_ADDR'], date('Y-m-d')));
            }
        }
    
    }

    class Panel{

        public static $cargos = [
			'0' => 'Normal',
			'1' => 'Sub-admin',
			'2' => 'Admin'
	    ];

		public static function logado(){
			return isset($_SESSION['login']) ? true : false;
		}

		public static function loggout(){
			session_destroy();
			header('Location: '.INCLUDE_PATH_PANEL);
		}

		public static function loadPage(){
			if (isset($_GET['url'])) {
				$url = explode('/',$_GET['url']);
				if (file_exists('pages/'.$url[0].'.php')) {
					include('pages/'.$url[0].'.php');
				}else{
					//quando a página não existe
					header('Location: '.INCLUDE_PATH_PANEL);
				}
			}else{
				include('pages/home.php');
			}
		}

		public static function listUsersOnline(){
			self::clearUsersOnline();
			$sql = MySql::connect()->prepare("SELECT * FROM `tb_admin.online`");
			$sql -> execute();
			return $sql->fetchAll();
		}

		public static function clearUsersOnline(){
			$date = date('Y-m-d H:i:s');
			$sql = MySql::connect()->exec("DELETE FROM `tb_admin.online` WHERE last_action < '$date' - INTERVAL 1 MINUTE");
		}

        public static function alert($type,$mensagem){
            if ($type == 'sucesso') {
                echo '<div class="sucesso"><i class="fa-solid fa-check"></i> '.$mensagem.'</div></br></br>';
            }else if ($type == 'erro') {
                echo '<div class="erro"><i class="fa-solid fa-xmark"></i> '.$mensagem.'</div></br></br>';
            }
        }

        public static function imageValid($imagem){
            if ($imagem['type'] == 'image/jpeg' || $imagem['type'] == 'image/jpg' || $imagem['type'] == 'image/png') {
                //convertendo o tamanho da imagem para kb
                $size = intval($imagem['size'] / 1024);
                if ($size < 10000) { //Apenas imagens com 10mb
                    return true;
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }

        public static function uploadImage($file){
            if(move_uploaded_file($file['tmp_name'], BASE_DIR_PANEL.'/uploads/'.$file['name']))
            return $file['name'];
        else
            return false;
        }

        //função que deleta a imagem antiga e mantém a nova
        public static function deleteFile($file){
            @unlink(BASE_DIR_PANEL.'/uploads/'.$file);
        }
	}

    class User{

        public function attUser($nome,$password,$img){
            $sql = MySql::connect()->prepare("UPDATE `tb_admin.users` SET nome = ?, password = ?, img = ? WHERE user = ?");
            if ($sql -> execute(array($nome,$password,$img,$_SESSION['user']))){
                return true;
            }else{
                return false;
            }
        }
    }

?>