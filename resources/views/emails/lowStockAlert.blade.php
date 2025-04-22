<!DOCTYPE html>
<html>
<head>
    <title>Low Stock Alert</title>
</head>
<body>
    <h2>Low Stock Alert for {{ $product->name }}</h2>
    <p>The stock level for <strong>{{ $product->name }}</strong> has fallen below the threshold</p>
    <p>Current Stock: <strong>{{ $product->stock }}</strong></p>
    <p>Please restock soon.</p>
</body>
</html>