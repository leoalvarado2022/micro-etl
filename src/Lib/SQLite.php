<?php
	namespace Lib;
	use \PDO as PDO;
	class SQLite implements DB{

		private pdo;

		public function connection($config){
			$sqlite = $config["connections"]["sqlite"];
			$driver = $sqlite["driver"];
			$database = $sqlite["database"];
			$dsn = "{$driver}:$database";

			try{
				$this->pdo = new PDO($dsn);
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