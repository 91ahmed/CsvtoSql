<?php
	
	/**
	 * 	Transform Csv to SQL Insert Statement
	 *
	 *	@author (Ahmed Hassan)
	 */
	class ExportCsv
	{
		private $file;
		private $table;
		private $query;

		public function file ($file)
		{
			$this->file = $file;

			return $this;
		}

		public function table ($table)
		{
			$this->table = $table;

			return $this;
		}

		public function getCsvHeader ()
		{
			$header = fopen($this->file, 'r');
			$getHeader = fgetcsv($header);

			$implode = implode(", ", $getHeader);

			return $implode;
		}

		public function getCsvData ()
		{
			$row = 1;
			$csvData = fopen($this->file, 'r');
			$data = []; // Store csv data
			$implode = []; // Store data after implode

		    while (($result = fgetcsv($csvData, 1000, ",")) !== FALSE) {
		    	array_push($data, $result);
		    }
		    fclose($csvData);

			foreach ($data as $value) {
				// Add Slashes to array values
				$addslash = array_map(function($str){
					return addslashes($str);
				}, $value);

				$string = implode("', '", $addslash);
				$string = "('".$string."')";
				array_push($implode, $string);
			}

		    return $implode;	
		}

		public function transform ()
		{
			$headers = $this->getCsvHeader($this->file);
			$query = "INSERT INTO {$this->table} ({$headers})\n VALUES \n";

			foreach ($this->getCsvData($this->file) as $key => $value) {
				$query .= $value.', ';
			}

			$query = rtrim($query, ', ');
			$query .= ';';

			$this->query = $query;

			return $this;
		}

		public function exportSQL ($filename)
		{
			file_put_contents($filename, $this->query);
		}
	}

?>