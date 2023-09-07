from flask import Flask, request, jsonify

app = Flask(__name__)

# Sample data for testing
data = {
    "1": {"name": "Alice", "age": 30},
    "2": {"name": "Bob", "age": 25},
    "3": {"name": "Charlie", "age": 35},
}

# Endpoint 1: Get all items
@app.route('/items', methods=['GET'])
def get_items():
    return jsonify(data)

# Endpoint 2: Get an item by ID
@app.route('/items/<string:item_id>', methods=['GET'])
def get_item(item_id):
    if item_id in data:
        return jsonify(data[item_id])
    else:
        return jsonify({"error": "Item not found"}), 404

# Endpoint 3: Add a new item
@app.route('/items', methods=['POST'])
def add_item():
    new_item = request.get_json()
    item_id = str(len(data) + 1)
    data[item_id] = new_item
    return jsonify({"message": "Item added successfully", "item_id": item_id}), 201

if __name__ == '__main__':
    app.run(host='0.0.0.0', port=80)
