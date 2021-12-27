<?php
	namespace Lib;
	use \PDO as PDO;
	class Connection{

		private $sql;
		private $res;
		private $db;
		public function __construct($db,$config){
			$this->db = new $db;
			$this->db->connection($config);
		}

		public function query($sql){
			$this->sql = $sql;
			$this->res = $this->db->query($sql);
			return $this;
		}

		public function getLastSQL() {
			return $this->sql;
		}

		public function rowCount(){
			return $this->res->rowCount();
		}

		public function fetchOne() {
			if($this->res !== null){
				return $this->res->fetch(PDO::FETCH_ASSOC);
			}
			return [];
		}

		public function fetchList() {
			if($this->res !== null){
				return $this->res->fetchAll(PDO::FETCH_ASSOC);
			}
			return [];
		}
	}