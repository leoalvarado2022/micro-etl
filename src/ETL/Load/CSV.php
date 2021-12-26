<?php
	namespace ETL\Load;

	class CSV extends Converter implements Convert{

		public function convert($data){
			return parent::_convert("csv",$data);
		}
	}