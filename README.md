# Transform Csv to SQL
### simple class for exporting data from .csv file and transform it to SQL insert statement.

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
Used to specify the csv file location that ready for transform.<br/>
It takes 1 string parameter (csv file location).

2- ``` table() ``` <br/>
Determine the name of the table you want to use in the SQL Insert statement.<br/>
It takes 1 string parameter (table name)

3- ``` transform() ``` <br/>
Transform csv format to SQL statement.

4- ``` exportSQL() ``` <br/>
This method creates a new .sql file with the new transformed data and putting it in the root directory by default.<br/>
It takes 1 string parameter (new sql file name)
