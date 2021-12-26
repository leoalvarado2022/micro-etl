<?php
	namespace ETL\Extract;

	class ExcelIterator extends IIterador implements \Iterator{ 

		private $reader;
		private $nameSheet;
		private $hasHeader;

		public function __construct($file){
			$this->reader = new XLSXReader($file);
			$this->nameSheet = $this->reader->getSheetNames()[0];
			$this->currentElement = $this->reader->getSheetData($this->nameSheet);
		}

		public function current(){
			$this->fieldCount = count($this->currentElement[0]);
			$this->rowCounter++;
	        return $this->currentElement[$this->rowCounter];
	    }

	    public function next(){
	    	return ( (count($this->currentElement) - 1) == ($this->rowCounter) );
	    }

	    public function valid(){
	    	if ($this->next()) {
	    		return false;
	    	}
	    	return isset($this->currentElement[$this->rowCounter]);
	    }
	}