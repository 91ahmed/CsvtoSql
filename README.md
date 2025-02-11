**CsvtoSql** is a class that converts CSV files into SQL INSERT statements, making it easy to import data into databases like MySQL, PostgreSQL, and SQLite.

### Install
via composer
``` bash
composer require csv/csvtosql
```

### Example

``` php
// Import vendor autoload
require ('vendor/autoload.php'); 

// Example
$csv = new Csv\Csvtosql\TransformCsv();
$csv->file('files/sales.csv') // Source (csv file)
    ->table('salse')
    ->transform()
    ->exportSQL('transform/sales.sql'); // Destination (new sql file with insert statement)
```

### Methods Description

1- ``` file() ``` <br/>
> Determine the source csv file you need to transform.
``` php
// @param string (csv source file path)
file('folder/file.csv');
```

2- ``` table() ``` <br/>
> Determine the name of the table you want to use in the sql statement.
> The class will consider the first row of the csv file as the columns of the table.
``` php
// @param string (table name)
table('tablename');
```

3- ``` transform() ``` <br/>
> Extract data from (csv) and Transform it to (sql).

4- ``` exportSQL() ``` <br/>
> Create a new (sql) file with the transformed data as an insert statement.
``` php
// @param string (new sql file destination)
exportSQL('exported/file.sql');
```
