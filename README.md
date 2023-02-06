## CsvtoSQL
PHP class for __exporting__ data from __csv__ file and __transform__ it into __SQL__ insert statement.

### Install
via composer
``` bash

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
> Determine the name of the table you want to use in the SQL statement.
``` php
// @param string (table name)
table('tablename');
```

3- ``` transform() ``` <br/>
> Extract data from (__csv__) and Transform it to (__SQL__).

4- ``` exportSQL() ``` <br/>
> Create a new (__sql__) file with the transformed data as an insert statement.
``` php
// @param string (new sql file destination)
exportSQL('exported/file.sql');
```
