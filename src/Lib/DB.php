<?php
	namespace Lib;
	interface DB{
		public function connection($config);
		public function query($sql);
		public function fetch();
	}