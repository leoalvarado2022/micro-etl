<?php
	namespace ETL\Load;

	class Converter{

		public function _convert($type,$data){
			return $this->$type($data);
		}

		private function json($data) {
			return json_encode($data);
		}

		private function csv($data) {
			//Todo, make the csv output file to download
			$hanlder = fopen('csvData.csv', 'w');
  
			foreach ($data as $datum) {
			    fputcsv($hanlder, $datum);
			}
			  
			fclose($hanlder);
		}
	}