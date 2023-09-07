# Simple REST API Documentation

This is a simple REST API for testing purposes. It provides the following endpoints:

- **GET /items**: Get a list of all items.
- **GET /items/{item_id}**: Get an item by its ID.
- **POST /items**: Add a new item.

## GET /items

### Request

- Method: GET
- URL: `/items`

### Response

- Status Code: 200 OK
- Body: JSON array of items.

### Example

```json
[
    {
        "1": {"name": "Alice", "age": 30},
        "2": {"name": "Bob", "age": 25},
        "3": {"name": "Charlie", "age": 35}
    }
]
