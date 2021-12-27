<?php
	namespace ETL\Extract;

	class SQLIterator extends IIterador implements \Iterator{ 
		
		public function __construct($data) {
			$this->currentElement = $data;
		}

		public function current(){
			
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