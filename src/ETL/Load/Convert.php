<?php
	namespace ETL\Load;

	interface Convert{
		public function convert($data);
	}