<?php
//definir json's
$json_ventas = '[
      {"product_id": 1, "quantity": 5},
      {"product_id": 2, "quantity": 3},
      {"product_id": 3, "quantity": 8},
      {"product_id": 4, "quantity": 6},
      {"product_id": 5, "quantity": 4}
    ]';
$data_ventas = json_decode($json_ventas, true);

$json_productos = '[
    {"product_id": 1, "product_name": "Laptop", "price": 800},
    {"product_id": 2, "product_name": "Smartphone", "price": 500},
    {"product_id": 3, "product_name": "Tablet", "price": 300},
    {"product_id": 4, "product_name": "Monitor", "price": 175},
    {"product_id": 5, "product_name": "Teclado", "price": 85}
]';
$data_productos = json_decode($json_productos, true);

function ventas($data_ventas, $data_productos){
    $max_cantidad = 0;
    $producto_top = "";

    foreach ($data_ventas as $venta) {
        if ($venta['quantity'] > $max_cantidad) {
            $max_cantidad = $venta['quantity'];
            foreach ($data_productos as $producto){
                if ($producto['product_id'] == $venta['product_id']){
                    $producto_top_nombre = $producto['product_name'];
                    $producto_top_id = $producto['product_id'];
                }
            }
        }
    }

    return $producto_top_id ."-". $producto_top_nombre;
}

echo "El producto más vendido es: " . ventas($data_ventas, $data_productos);

?>