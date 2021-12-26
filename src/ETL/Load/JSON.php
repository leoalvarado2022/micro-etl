<?php
	namespace ETL\Load;

	class JSON extends Converter implements Convert{

		public function convert($data){
			return parent::_convert("json",$data);
		}
	}