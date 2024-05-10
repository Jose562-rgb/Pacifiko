<?php
$json_carrito = '[
  {"product_id": 1, "quantity": 2},
  {"product_id": 3, "quantity": 4},
  {"product_id": 4, "quantity": 3}
]';

$data = json_decode($json_carrito, true);

$json_productos = [
    ["product_id" => 1, "product_name" => "Laptop", "price" => 800],
    ["product_id" => 2, "product_name" => "Celular", "price" => 500],
    ["product_id" => 3, "product_name" => "Tablet", "price" => 300],
    ["product_id" => 4, "product_name" => "Monitor", "price" => 100],
    ["product_id" => 5, "product_name" => "Teclado", "price" => 200]
];

function calculateCartTotal($data, $json_productos) {
    $totalPrice = 0;
    foreach ($data as $item) {
        foreach ($json_productos as $producto) {
            if ($producto['product_id'] == $item['product_id']) {
                $totalPrice += $producto['price'] * $item['quantity'];
                break;
            }
        }
    }
    return $totalPrice;
}

$total = calculateCartTotal($data, $json_productos);
echo "Total: Q" . $total;
?>