<?php
	namespace Lib;

	class Connection{

		private $sql;
		private $res;
		private $db;
		public function __construct(DB $db){
			$this->db = $db;
			$this->db->connection();
		}

		public function query($sql){
			$this->sql = $sql;
			$this->res = $this->db->query($sql);
		}

		public function getLastSQL() {
			return $this->sql;
		}

		public function fetchRow() {
			return $this->res->fetch();
		}

		public function fetchList() {
			$data = [];
			while($datum = $this->res->fetch()){
				$data[] = $datum;
			}
			return $data;
		}
	}