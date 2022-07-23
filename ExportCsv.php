<?php
	
	/**
	 * 	Transform Csv File to SQL Insert Statement
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

/**
# Transform Csv to SQL
## simple class for exporting data from .csv file and transform it to SQL insert statement.

## Example

``` php
$csv = new ExportCsv();
$csv->file('files/sales.csv')
	->table('users')
	->transform()
	->exportSQL('csv.sql');
```

## Class Methods

1- ``` file() ``` <br/>
Used to specify the csv file location that ready for transform.
It takes 1 string parameter (csv file location).

2- ``` table() ``` <br/>
Determine the name of the table you want to use in the SQL Insert statement.
It takes 1 string parameter (table name)

3- ``` transform() ``` <br/>
Transform csv formt to SQL statement.

4- ``` exportSQL() ``` <br/>
This method creates a new .sql file with the new transformed data and putting it in the root directory by default.
It takes 1 string parameter (new sql file name)
*/
?>