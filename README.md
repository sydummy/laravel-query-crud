## Installation

-   Run this in your cmd folder path in htdocs: git clone https://github.com/sydummy/laravel-query-crud.git
-   In cmd, go to the folder "laravel-query-crud", run **composer update**
-   Copy .env.example and save as .env
-   Generate app key by running **php artisan key:generate**
-   Create database name "laravel_query_crud" in your localhost PHPMyAdmin
-   Create table name "items"

```sql
CREATE TABLE `items` (
  `id` varchar(255) NOT NULL PRIMARY,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `updated_at` timestamp NULL,
  `created_at` timestamp NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
```

-   In cmd, enter **php artisan migrate** for the database
-   Next, enter **php artisan serve** to run in localhost

## API QUERY

| Action                     | Method   | API                                          | Headers                                                     | Body             |
| -------------------------- | -------- | -------------------------------------------- | ----------------------------------------------------------- | ---------------- |
| `Show All Items`           | `GET`    | `http://localhost:8000/api/items`            |                                                             |                  |
| `Show Single Item`         | `GET`    | `http://localhost:8000/api/item/{id}`        |                                                             |                  |
| `Show Single Item By Name` | `GET`    | `http://localhost:8000/api/item/name/{name}` |                                                             |                  |
| `Insert New Item`          | `POST`   | `http://localhost:8000/api/item`             | `Acceptapplication/json`<br> `Content-Typeapplication/json` | `See Body Below` |
| `Update Item`              | `PUT`    | `http://localhost:8000/api/item`             | `Acceptapplication/json`<br> `Content-Typeapplication/json` | `See Body Below` |
| `Delete Item`              | `DELETE` | `http://localhost:8000/api/item/{id}`        | `Acceptapplication/json`<br> `Content-Typeapplication/json` |                  |

## Insert New Item Body

```json
{
    "name": "Name",
    "description": "Description",
    "owner": "Owner"
}
```

## Update Item Body

```json
{
    "id": "8cvrR9dE2QCIaVoECkhYzM", //Change this ID
    "name": "New Name",
    "description": "Description",
    "owner": "Owner"
}
```
