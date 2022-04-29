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
               $sql = MySql::connect()->prepare("UPDATE `tb_admin.online` SET last_action = ? WHERE token = ?");
               $sql->execute(array($horarioAtual,$token));
           }else{
               $_SESSION['online'] = uniqid();
               $ip = $_SERVER['REMOTE_ADDR'];
               $horarioAtual = date('Y-m-d H:i:s');
               $token = $_SESSION['online'];
               $sql = MySql::connect()->prepare("INSERT INTO `tb_admin.online` VALUES(null,?,?,?)");
               $sql -> execute(array($ip,$horarioAtual,$token));
           }
        }
    
    }

    class Panel
	{
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
	}

?>