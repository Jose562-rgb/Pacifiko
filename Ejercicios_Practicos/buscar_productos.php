<?php
$json = '[
  {"product_id": 1, "product_name": "Laptop", "price": 800},
  {"product_id": 2, "product_name": "Celular", "price": 500},
  {"product_id": 3, "product_name": "Tablet", "price": 300},
  {"product_id": 4, "product_name": "Monitor", "price": 175},
  {"product_id": 5, "product_name": "Teclado", "price": 90}
]';
$data = json_decode($json, true);

function searchProduct($product_name, $data)
{
    foreach ($data as $producto) {
        if ($producto['product_name'] == $product_name) {
            return $producto;
        }
    }
    return "No se encontró el producto";
}

$resultado = searchProduct("Teclado", $data);
if (is_array($resultado)) {
    echo "Producto encontrado: " . $resultado['product_name'] . ", Precio: " . $resultado['price'];
} else {
    echo $resultado;
}
?>
