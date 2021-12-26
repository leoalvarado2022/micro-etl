<?php
	namespace ETL\Extract;

	class CsvIterator extends IIterador implements \Iterator {
		const ROW_SIZE = 4096;

		public function __construct($file,$delimiter=","){
			parent::__construct($file,$delimiter);
		}

		public function current()
	    {
	        $this->currentElement = fgetcsv($this->filePointer, self::ROW_SIZE, $this->delimiter);
	        $this->fieldCount = count($this->currentElement[0]);
	        $this->rowCounter++;

	        return $this->currentElement;
	    }

	    public function next(){
	        if (is_resource($this->filePointer)) {
	            return !feof($this->filePointer);
	        }

	        return false;
	    }

	    public function valid(){
	        if (!$this->next()) {
	            if (is_resource($this->filePointer)) {
	                fclose($this->filePointer);
	            }

	            return false;
	        }

	        return true;
	    }
	}