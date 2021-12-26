<?php
	namespace ETL\Load;

	class Loader{
		private $convert;
		public function __construct(Convert $convert){
			$this->convert=$convert;
		}

		public function convert($data){
			return $this->convert->convert($data);
		}
	}