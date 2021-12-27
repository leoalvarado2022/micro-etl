<?php
	namespace ETL\Load;

	class Loader{
		private $convert;
		public function __construct($convert){
			$this->convert= new $convert;
		}

		public function convert($data){
			return $this->convert->convert($data);
		}
	}