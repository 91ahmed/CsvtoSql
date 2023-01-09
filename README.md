## Transform Csv to SQL
PHP class for __exporting__ data from _.csv_ file and __transform__ it to _SQL_ insert statement.

#### How to Use

``` php
// Import ExportCsv class
require ('ExportCsv.php');

// Example
$csv = new ExportCsv();
$csv->file('files/sales.csv') // Source
    ->table('salse')
    ->transform()
    ->exportSQL('exported/sales.sql'); // destination
```

#### Class Methods

1- ``` file() ``` <br/>
> Determine the source file you need to transform.
``` php
// @param string, source file
file('folder/file.csv');
```

2- ``` driver() ```
> Select a database driver if you want the format of the SQL statement to be compatible with a specific database.
``` php
// @param string, database driver name
driver('mysql');
```

3- ``` table() ```
> Determine the name of the table you want to use in the SQL statement.
``` php
// @param string, table name
table('tablename');
```

4- ``` transform() ```
> Transform _csv_ format to _SQL_ statement.

5- ``` exportSQL() ```
> This method creates a new _.sql_ file with the new transformed data.
``` php
// @param string, SQL file destination
exportSQL('exported/file.sql');
```

<br/>
<br/>

![logo](https://raw.githubusercontent.com/91ahmed/91ahmed/main/logo-ahmed.png)