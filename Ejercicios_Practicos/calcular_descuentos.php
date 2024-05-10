<?php
//definir json's
$json_descuentos = '[
    {"product_id": 1, "descuento": 10},
    {"product_id": 2, "descuento": 15},
    {"product_id": 3, "descuento": 10},
    {"product_id": 4, "descuento": 5},
    {"product_id": 5, "descuento": 8}
]';

$data_descuentos = json_decode($json_descuentos, true);

$json_carrito = '[
    {"product_id": 1, "quantity": 2},
    {"product_id": 3, "quantity": 10},
    {"product_id": 4, "quantity": 5}
]';

$data_carrito = json_decode($json_carrito, true);

$productos = [
    ["product_id" => 1, "product_name" => "Laptop", "price" => 800],
    ["product_id" => 2, "product_name" => "Smartphone", "price" => 500],
    ["product_id" => 3, "product_name" => "Tablet", "price" => 300],
    ["product_id" => 4, "product_name" => "Monitor", "price" => 175],
    ["product_id" => 5, "product_name" => "Teclado", "price" => 85]
];

function calcularDescuentos($data_carrito, $productos, $data_descuentos) {
    $totalPrecio = 0;
    foreach ($data_carrito as $item) {
        foreach ($productos as $producto) {
            if ($producto['product_id'] == $item['product_id']) {
                $descuento = 0; 
                foreach ($data_descuentos as $descuento_producto) {
                    if ($descuento_producto['product_id'] == $producto['product_id']) {
                        $descuento = $descuento_producto['descuento'];
                        break;
                    }
                }
                $precioConDescuento = $producto['price'] * (1 - $descuento / 100);
                $totalPrecio += $precioConDescuento * $item['quantity'];
                break;
            }
        }
    }
    return $totalPrecio;
}

$totalConDescuentos = calcularDescuentos($data_carrito, $productos, $data_descuentos);
echo "Total con descuentos: Q" . $totalConDescuentos;

?>