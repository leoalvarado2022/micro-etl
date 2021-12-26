<?php
	namespace ETL\Extract;

	class IIterador {
	    public $filePointer = null;
	    public $currentElement = null;
	    public $rowCounter = null;
	    public $delimiter = null;
	    public $fieldCount = 0;
	    public function __construct($file, $delimiter = ',') {
	        try {
	            $this->filePointer = fopen($file, 'rb');
	            $this->delimiter = $delimiter;
	        } catch (\Exception $e) {
	            throw new \Exception('The file "' . $file . '" cannot be read.');
	        }
	    }

	    public function rewind() {
	        $this->rowCounter = 0;
	        if(is_resource($this->filePointer)) rewind($this->filePointer);
	    }

	    public function key(){
	        return (int)$this->rowCounter;
	    }
	}