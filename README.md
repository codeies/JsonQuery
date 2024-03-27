# JsonQuery

JsonQuery is a PHP class that allows you to perform operations similar to MySQL queries on JSON data, including searching, sorting, and pagination.

## Installation

You can install JsonQuery via Composer by adding it as a dependency to your `composer.json` file:

```bash
composer require codeies/json-query
```

## Usage

```php
require_once 'vendor/autoload.php';

use Codeies\JsonQuery\JsonQuery;

// Create a new instance of JsonQuery
$jsonQuery = new JsonQuery('path/to/your/data.json');

// Find method
$results = $jsonQuery->find('searchValue')
                    ->sort('category', 'desc')
                    ->paginate($page, $perPage)
                    ->getData();
```

## Methods
```php
find($value)
Searches for the specified value within the JSON data.

sort($key, $order = 'asc')
Sorts the filtered data by the specified key and order.

paginate($page, $perPage)
Paginates the filtered data based on the specified page number and items per page.

getData()
Returns the filtered and paginated data.


```
```json
[
    {"id": 1, "name": "Product 1", "category": "Category A", "price": 10.99},
    {"id": 2, "name": "Product 2", "category": "Category B", "price": 20.99},
    ...
]
```

## License
This project is licensed under the MIT License - see the LICENSE file for details.
Make sure to replace `'path/to/your/data.json'` with the actual path to your JSON data file and update any placeholders with your actual project details.

This `README.md` file provides a brief overview of your package, instructions on how to install it using Composer, a usage example, details about the methods available, an example data format, and information about the license.





## // Output results
print_r($results);
