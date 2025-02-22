**CsvtoSql** is a class that converts CSV files into SQL INSERT statements, making it easy to import data into databases like MySQL, PostgreSQL, and SQLite.

### Install via composer
``` bash
composer require csv/csvtosql
```

### Example
``` php
// Import vendor autoload
require ('vendor/autoload.php'); 

// Example
$csv = new Csv\Csvtosql\TransformCsv();
$csv->file('files/sales.csv') // Source csv file
    ->table('salse') // Target table name
    ->transform()
    ->exportSQL('transform/sales.sql'); // Destination (output the sql file with insert statement)
```

### Methods Description
1- ``` file() ``` <br/>
> Specify the source csv file path you need to transform.
``` php
// @param string (csv source file path)
file('folder/file.csv');
```

2- ``` table() ``` <br/>
> Set the target table name; the first CSV row is used as column names.
``` php
// @param string (table name)
table('tablename');
```

3- ``` transform() ``` <br/>
> Extract data from (csv) and transform it to (sql).

4- ``` exportSQL() ``` <br/>
> Generate a new SQL file containing the transformed data as well-structured INSERT statements, ready for integration into your database.
``` php
// @param string (new sql file destination)
exportSQL('exported/file.sql');
```

## Contributing
Contributions are welcome! Please fork the repository and submit a pull request.

## License
This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.

By incorporating these sections, the `README.md` will provide a comprehensive overview of the CsvtoSql library, guiding users from installation to implementation effectively. 
