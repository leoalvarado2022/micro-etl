<?php

	namespace ETL\Transform;

	use ETL\Load\Loader;

	class ChainProcess {

		private $iterator;
		private $fieldsIN;
		private $fieldsDelete;
		private $data;
		private $rules;

		public function __construct(\Iterator $iterator,$fieldsIN = [],$fieldsDelete = []) {
			if($iterator instanceof \Iterator ) {
				$this->iterator = $iterator;
			}else {
				throw new \Exception("El 1er parametro no es de tipo \Iterator");
			}
			$this->fieldsIN = $fieldsIN;
			$this->fieldsDelete = $fieldsDelete;
			$this->rules = [];
		}

		public function process(){
			foreach($this->iterator as $index => $row) {
				foreach($row as $j => $data){
					$arrField = explode("|",$this->fieldsIN[$j]);
					$fieldName = $arrField[0];
					if(isset($arrField[1])) {
						$rule = explode(":",$arrField[1])[1];
						$data = $this->applyRule($rule,$data);
					}

					$this->data[$index][$fieldName] = (string)$data;
				}
			}

			$this->data = array_map(function($arr) {
			  	return array_diff_key($arr,$this->fieldsDelete);
			},$this->data);

			return $this;
		}

		public function addRules($name,$callback) {
			$this->rules[$name] = $callback;
		}

		public function processRules() {
			//TODO
		}

		public function deleteFields() {
			//TODO
		}

		private function applyRule($name,$value){
			return call_user_func($this->rules[$name],$value);
		}

		public function setData() { //used when not process the data
			$this->data = $this->iterator->currentElement;
			return $this;
		}

		public function getData($type = "array") {
			if($type == "json"){
				$_data = $this->utf8ize($this->data);
				$this->data = json_encode($_data);
			}
			return $this;
		}

		public function convertTo(Loader $Loader) {
			return $Loader->convert($this->data);
		}

		private function utf8ize($d) {
		    if (is_array($d)) {
		        foreach ($d as $k => $v) {
		            $d[$k] = $this->utf8ize($v);
		        }
		    } else if (is_string ($d)) {
		        return utf8_encode($d);
		    }
		    return $d;
		}

	}