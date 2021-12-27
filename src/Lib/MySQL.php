<?php
	namespace Lib;
	use \PDO as PDO;
	class MySQL implements DB{

		private $pdo;

		public function connection($config){
			$mysql = $config["connections"]["mysql"];
			$driver = $mysql["driver"];
			$host = $mysql["host"];
			$dbname = $mysql["database"];
			$charset = $mysql["charset"];
			$username = $mysql["username"];
			$password = $mysql["password"];
			$port = $mysql["port"];
			$dsn = "$driver:host=$host;dbname=$dbname;port:$port;charset=$charset";

			try{
				$this->pdo = new PDO($dsn,$username,$password);
				$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			} catch(PDOException $e) {
				die($e->getMessage());
			}

			return $this;
		}

		public function query($sql){
			try{
				return $this->pdo->query($sql);
			}catch(PDOException $e) {
				die("Error Nro: {$e->getCode()} Msg: {$e->getMessage()}");
			}
		}
	}